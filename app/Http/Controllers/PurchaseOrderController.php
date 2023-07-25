<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePurchaseOrder;
use App\Models\PurchaseOrder;
use App\Models\RequestDetail;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index() {

        $pos = PurchaseOrder::with('requestDetail')->paginate();

        return view('reports.purchaseOrder.index', compact('pos'));
    }

    public function create($id) {

        $pr_count = PurchaseOrder::max('id');


        if (is_null($pr_count)) {
            $pr_count = 0;
        } else {
            $pr_count++;
        }

        $formated_count = sprintf("%04d", $pr_count);

        $year = date('Y');
        $date = "PO-{$year}-XXXX";

        $pos = RequestDetail::with('department', 'purchaseRequest', 'abstractCanvass')->find($id);
        $supplier = Supplier::find($pos->abstractCanvass->winner);

        return view('reports.purchaseOrder.create', compact('date', 'pos', 'supplier', 'id'));
    }

    public function store(StorePurchaseOrder $request, $id) {

        $year = date('Y');

        $po = PurchaseOrder::create($request->except('po_no'));
        $formated_count = sprintf("%04d", $po->id);
        $po->po_no = "PO-{$year}-{$formated_count}";
        $po->save();

        RequestDetail::find($id)->update(['status' => 9]);

        return redirect()->route('po.index');
    }

    public function edit($id) {

        $pos = RequestDetail::with('department', 'purchaseRequest', 'abstractCanvass', 'purchaseOrder')->find($id);
        $supplier = Supplier::find($pos->abstractCanvass->winner);

        return view('reports.purchaseOrder.edit', compact('pos', 'supplier'));
    }

    public function update(StorePurchaseOrder $request, $id) {
        PurchaseOrder::find($id)->update($request->validated());

        return redirect()->route('po.index');
    }

    public function delete($id, $rid) {

        PurchaseOrder::find($id)->delete($id);

        $req = RequestDetail::find($rid);
        $req->status = 8;
        $req->save();

        return redirect()->back();
    }

}
