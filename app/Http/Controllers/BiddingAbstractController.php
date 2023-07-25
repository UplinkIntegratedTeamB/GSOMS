<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRequest;
use App\Models\Attendance;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\RequestDetail;
use App\Models\BiddingOffered;
use App\Models\BiddingAbstract;
use Illuminate\Http\JsonResponse;
use App\Models\BiddingOfferedItem;
use App\Http\Requests\StoreAbstractBid;
use App\Http\Requests\StoreBiddingSupplier;

class BiddingAbstractController extends Controller
{
    public function create($id) {

        $requests = RequestDetail::with('department', 'purchaseRequest.item')->find($id);
        $suppliers = Supplier::all();

        return view('reports-bidding.abstract.create', compact('requests', 'suppliers', 'id'));
    }

    public function store(StoreAbstractBid $request, $id)
    {
        $year = date('Y');

        $biddingCanvass = BiddingAbstract::create($request->only('winner', 'purpose', 'cash_bond') + ['request_detail_id' => $id]);
        $good = sprintf("%04d", $biddingCanvass->id);
        $biddingCanvass->good = "{$good}-{$year}";
        $biddingCanvass->save();

        $supplier = $request->supplier_id;
        $biddingOffered = BiddingOffered::create([
            'supplier_id' => $supplier,
            'bidding_abstract_id' => $biddingCanvass->id,
            'grand_total' => $request->grand_total,
        ]);

        $supplierOfferedItems = collect($request->inventory)->map(fn(array $offeredItem) => ['item_id' => $offeredItem['item_id'], 'quantity' => $offeredItem['quantity'], 'total_amt' => $offeredItem['total_amt'], 'offer_price' => $offeredItem['offer_price'], 'bidding_offered_id' => $biddingOffered->id])->toArray();

        BiddingOfferedItem::insert($supplierOfferedItems);

        RequestDetail::find($id)->update(['status' => 6]);

        return redirect()->route('abstract-bid.show', $biddingCanvass->id);
    }

    public function show($id) {

        $abstracts = BiddingAbstract::with('requestDetail.department', 'requestDetail.purchaseRequest', 'biddingOffereds.biddingOfferedItems', 'biddingOffereds.supplier')->find($id);
        $suppliers = Supplier::all();

        return view('reports-bidding.abstract.view', compact('abstracts', 'id', 'suppliers'));
    }

    public function update(Request $request, $id) {

        $sOffered = BiddingOffered::with('biddingOfferedItems')->find($id);
        $sOffered->grand_total = $request->grand_total;
        $sOffered->save();

        $items = collect($request->inventory)->map(function (array $item) use ($sOffered) {
            return [
                'item_id' => $item['item_id'],
                'quantity' => $item['quantity'],
                'offer_price' => $item['offer_price'],
                'total_amt' => $item['total_amt'],
                'bidding_offered_id' => $sOffered->id,
            ];
        })->toArray();

        foreach ($items as $item) {
            $supplierOfferedItem = BiddingOfferedItem::find($item['item_id']);
            $supplierOfferedItem->update($item);
        }

        return redirect()->back();
    }

    public function addSupplier(StoreBiddingSupplier $request, $id) {

        $supplier = $request->supplier_id;
        $supplierOffered = BiddingOffered::create([
            'supplier_id' => $supplier,
            'bidding_abstract_id' => $id,
            'grand_total' => $request->grand_total,
        ]);

        $supplierOfferedItems = collect($request->inventory)->map(fn(array $offeredItem) => ['item_id' => $offeredItem['item_id'], 'quantity' => $offeredItem['quantity'], 'total_amt' => $offeredItem['total_amt'], 'offer_price' => $offeredItem['offer_price'], 'bidding_offered_id' => $supplierOffered->id])->toArray();
        BiddingOfferedItem::insert($supplierOfferedItems);

        return redirect()->back();
    }

    public function view(BiddingAbstract $biddingAbstract) : JsonResponse
    {
        return response()->json($biddingAbstract->load('biddingOffereds.biddingOfferedItems.item'));
    }

    public function delete($id, $rid)
    {
        $abstract = BiddingAbstract::find($id);
        $abstract->delete($id);

        RequestDetail::find($rid)->update(['status' => 5]);

        return redirect()->back();
    }

    public function compute($id)
    {
        $abstractsSupplier = BiddingAbstract::with('biddingOffereds')->find($id);
        $lowest = null;
        $lowestId = null;

        foreach ($abstractsSupplier->biddingOffereds as $abstract) {
            $grandTotal = $abstract->grand_total;
            $abstractId = $abstract->supplier_id;

            if ($lowest === null || $grandTotal < $lowest) {
                $lowest = $grandTotal;
                $lowestId = $abstractId;
            }
        }

        $canvass = BiddingAbstract::find($id);
        $canvass->update(['winner' => $lowestId, 'winner_total' => $lowest]);


        RequestDetail::find($canvass->request_detail_id)->update(['status' => 7]);

        return redirect()->route('abstract-bid.attendance', $id);
    }

    public function removeItem($id)
    {
        BiddingOffered::find($id)->delete();

        return redirect()->back();
    }

    public function index()
    {

        $abstracts = BiddingAbstract::with('requestDetail.department')->paginate();

        return view('reports-bidding.abstract.index', compact('abstracts'));
    }

    public function attendance($id) {

        $abstract = BiddingAbstract::find($id);

        return view('reports-bidding.abstract.attendance', compact('abstract', 'id'));
    }

    public function addAttendance(StoreAttendanceRequest $request, $id, $rid) {
        Attendance::create($request->validated() + ['bidding_abstract_id' => $id]);

        RequestDetail::find($rid)->update(['status' => 8]);

        return redirect()->route('abstract-bid.index');
    }

}
