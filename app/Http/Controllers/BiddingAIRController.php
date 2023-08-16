<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestDetail;
use App\Models\AcceptanceInspection;
use App\Http\Requests\StoreBiddingAir;

class BiddingAIRController extends Controller
{
    public function create($id) {

        $details = RequestDetail::with('biddingPurchaseOrder', 'purchaseRequest', 'department', 'division', 'section', 'biddingAbstract')->find($id);

        $year = date('Y');
        $date = "AIR-{$year}-XXXX";

        return view('reports-bidding.air.create', compact('details', 'date', 'id'));
    }

    public function store($id) {
        $year = date('Y');

        $air =  AcceptanceInspection::create(['request_detail_id' => $id]);
        $formated_count = sprintf("%04d", $air->id);
        $air->c_number = "AIR-{$year}-{$formated_count}";
        $air->save();

        RequestDetail::find($id)->update(['status' => 11]);

        return redirect()->route('air-bid.index');
    }

    public function index() {
        $airs = RequestDetail::with('acceptanceInspection')->where('procurement_mode_id', 1)->get();

        return view('reports-bidding.air.index', compact('airs'));
    }

    public function edit($id) {
        $details = RequestDetail::with('biddingPurchaseOrder', 'purchaseRequest', 'department', 'division', 'section', 'biddingAbstract', 'acceptanceInspection')->find($id);

        return view('reports-bidding.air.edit', compact('details', 'id'));
    }

    public function update($id) {

        // AcceptanceInspection::find($id)->update($request->validated());

        return redirect()->route('air-bid.index');
    }

    public function delete($id, $rid) {

        AcceptanceInspection::find($id)->delete($id);

        RequestDetail::find($rid)->update(['status' => 10]);

        return redirect()->back();
    }

}
