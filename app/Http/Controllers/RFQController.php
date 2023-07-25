<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRFQRequest;
use App\Models\Quotation;
use App\Models\RequestDetail;
use Illuminate\Http\Request;

class RFQController extends Controller
{
    public function create($id) {

        $request = RequestDetail::with('purchaseRequest', 'department', 'division', 'purchaseRequest.item.itemType')->find($id);

        $quotation = Quotation::max('id');

        if (is_null($quotation)) {
            $quotation = 0;
        } else {
            $quotation++;
        }

        $formated_count = sprintf("%04d", $quotation);

        $year = date('Y');
        $qFormat = "Q-{$year}-XXXX";

        return view('reports.rfq.create', compact('request', 'qFormat', 'id'));
    }

    public function store(StoreRFQRequest $request, $id) {
        $year = date('Y');

        $quotation = Quotation::create($request->except('quotation_no'));
        $formated_count = sprintf("%04d", $quotation->id);
        $quotation->quotation_no = "Q-{$year}-{$formated_count}";
        $quotation->save();

        $requestDetail = RequestDetail::find($id);
        $requestDetail->status = 7;
        $requestDetail->save();

        return redirect()->route('rfq.index');
    }

    public function index() {

        $quotations = Quotation::with('requestDetail', 'requestDetail.department')->get();

        return view('reports.rfq.index', compact('quotations'));
    }

    public function edit($id) {
        $quotations = Quotation::with('requestDetail.purchaseRequest', 'requestDetail.department', 'requestDetail.division')->find($id);

        return view('reports.rfq.update', compact('quotations', 'id'));
    }

    public function update(Request $request, $id) {
        Quotation::find($id)->update($request->all());

        return redirect()->route('rfq.index');
    }

    public function delete($id, $rid) {

        Quotation::find($id)->delete($id);

        RequestDetail::find($rid)->update(['status' => 6]);

        return redirect()->back();
    }

}
