<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBiddingPO;
use App\Models\BiddingPurchaseOrder;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\RequestDetail;

class BiddingPOController extends Controller
{
    public function create($id) {

        $requests = RequestDetail::with('department')->find($id);
        $supplier = Supplier::find($requests->biddingAbstract->winner);

        $year = date('Y');
        $cFormat = "PO-{$year}-XXXX";

        return view('reports-bidding.purchaseOrder.create', compact('cFormat', 'requests', 'supplier', 'id'));
    }

    public function store(StoreBiddingPO $request, $id) {
        $year = date('Y');

        $po = BiddingPurchaseOrder::create($request->except('po_no'));

        $formated_count = sprintf("%04d", $po->id);
        $po->po_no = "PO-{$year}-{$formated_count}";
        $po->save();

        RequestDetail::find($id)->update(['status' => 10]);

        return redirect()->route('po-bid.index');
    }

    public function index() {

        $pos = BiddingPurchaseOrder::with('requestDetail')->paginate();

        return view('reports-bidding.purchaseOrder.index', compact('pos'));
    }

    public function edit($id) {
        $pos = RequestDetail::with('department', 'purchaseRequest', 'biddingAbstract', 'biddingPurchaseOrder')->find($id);
        $supplier = Supplier::find($pos->biddingAbstract->winner);

        return view('reports-bidding.purchaseOrder.edit', compact('pos', 'supplier', 'id'));
    }

    public function update(StoreBiddingPO $request, $id) {
        BiddingPurchaseOrder::find($id)->update($request->validated());

        return redirect()->route('po-bid.index');
    }

    public function delete($id, $rid) {

        BiddingPurchaseOrder::find($id)->delete($id);

        $req = RequestDetail::find($rid);
        $req->status = 9;
        $req->save();

        return redirect()->back();
    }


}
