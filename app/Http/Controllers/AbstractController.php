<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\RequestDetail;
use App\Models\AbstractCanvass;
use App\Models\SupplierOffered;
use App\Models\AbstractSupplier;
use Illuminate\Support\Facades\DB;
use App\Models\SupplierOfferedItem;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreAbstractRequest;

class AbstractController extends Controller
{
    public function create($id)
    {
        $requests = RequestDetail::with('department', 'purchaseRequest.item')->find($id);
        $suppliers = Supplier::all();

        return view('reports.abstract.create', compact('requests', 'suppliers', 'id'));
    }

    public function store(StoreAbstractRequest $request, $id)
    {
        $abstractCanvass = AbstractCanvass::create($request->only('winner') + ['request_detail_id' => $id]);

        $supplier = $request->supplier_id;
        $supplierOffered = SupplierOffered::create([
            'supplier_id' => $supplier,
            'abstract_canvass_id' => $abstractCanvass->id,
            'grand_total' => $request->grand_total,
        ]);

        $supplierOfferedItems = collect($request->inventory)->map(fn(array $offeredItem) => ['item_id' => $offeredItem['item_id'], 'description' => $offeredItem['description'], 'quantity' => $offeredItem['quantity'], 'total_amt' => $offeredItem['total_amt'], 'offer_price' => $offeredItem['offer_price'], 'supplier_offered_id' => $supplierOffered->id])->toArray();

        SupplierOfferedItem::insert($supplierOfferedItems);

        return redirect()->route('abstract.show', $abstractCanvass->id);
    }

    public function update(Request $request, $id)
    {
        $sOffered = SupplierOffered::with('supplierOfferedItems')->find($id);
        $sOffered->grand_total = $request->grand_total;
        $sOffered->save();

        $items = collect($request->inventory)->map(function (array $item) use ($sOffered) {
            return [
                'item_id' => $item['item_id'],
                'description' => $item['description'],
                'quantity' => $item['quantity'],
                'offer_price' => $item['offer_price'],
                'total_amt' => $item['total_amt'],
                'supplier_offered_id' => $sOffered->id,
            ];
        })->toArray();

        foreach ($items as $item) {
            $supplierOfferedItem = SupplierOfferedItem::find($item['item_id']);
            $supplierOfferedItem->update($item);
        }

        // Rest of your code or any additional logic

        return redirect()->back();
    }




    public function index()
    {

        $abstracts = AbstractCanvass::with('requestDetail.department')->paginate();

        return view('reports.abstract.index', compact('abstracts'));

    }

    public function delete($id, $rid)
    {

        $abstract = AbstractCanvass::find($id);
        $abstract->delete($id);

        RequestDetail::find($rid)->update(['status' => 7]);

        return redirect()->back();
    }

    public function show($id)
    {

        $abstracts = AbstractCanvass::with('requestDetail.department', 'requestDetail.purchaseRequest', 'supplierOffereds.supplierOfferedItems')->find($id);
        $suppliers = Supplier::all();

        return view('reports.abstract.view', compact('abstracts', 'id', 'suppliers'));
    }

    public function addSupplier(StoreAbstractRequest $request, $id)
    {
        $supplier = $request->supplier_id;
        $supplierOffered = SupplierOffered::create([
            'supplier_id' => $supplier,
            'abstract_canvass_id' => $id,
            'grand_total' => $request->grand_total,
        ]);
        $supplierOfferedItems = collect($request->inventory)->map(fn(array $offeredItem) => ['item_id' => $offeredItem['item_id'], 'quantity' => $offeredItem['quantity'], 'description' => $offeredItem['description'], 'total_amt' => $offeredItem['total_amt'], 'offer_price' => $offeredItem['offer_price'], 'supplier_offered_id' => $supplierOffered->id])->toArray();
        SupplierOfferedItem::insert($supplierOfferedItems);

        return redirect()->back();
    }

    public function view(AbstractCanvass $abstractCanvass)
    {

        return response()->json($abstractCanvass->load('supplierOffereds.supplierOfferedItems.item'));
    }

    public function compute($id)
    {
        $abstractsSupplier = AbstractCanvass::with('supplierOffereds')->find($id);
        $lowest = null;
        $lowestId = null;

        foreach ($abstractsSupplier->supplierOffereds as $abstract) {
            $grandTotal = $abstract->grand_total;
            $abstractId = $abstract->supplier_id;

            if ($lowest === null || $grandTotal < $lowest) {
                $lowest = $grandTotal;
                $lowestId = $abstractId;
            }
        }

        $canvass = AbstractCanvass::find($id);
        $canvass->update(['winner' => $lowestId]);


        RequestDetail::find($canvass->request_detail_id)->update(['status' => 8]);

        return redirect()->route('abstract.index');
    }

    public function removeItem($id)
    {
        SupplierOffered::find($id)->delete();

        return redirect()->back();
    }

}
