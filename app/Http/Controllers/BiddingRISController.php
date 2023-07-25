<?php

namespace App\Http\Controllers;

use App\Models\RequestIssue;
use Illuminate\Http\Request;
use App\Models\RequestDetail;
use App\Http\Requests\StoreRisRequest;

class BiddingRISController extends Controller
{
    public function create($id) {
        $requests = RequestDetail::with('purchaseRequest', 'department', 'acceptanceInspection')->find($id);
        $year = date('Y');
        $date = "RIS-{$year}-XXXX";

        return view('reports-bidding.ris.create', compact('requests', 'date', 'id' ));
    }

    public function index() {

        $requests = RequestDetail::with('purchaseRequest', 'department', 'acceptanceInspection', 'requestIssue')->where('status', 12)->where('procurement_mode_id', 1)->get();

        return view('reports-bidding.ris.index', compact('requests', ));
    }

    public function store(StoreRisRequest $request, $id) {

        $year = date('Y');

        $ris = RequestIssue::create($request->validated() + ['request_detail_id' => $id]);
        $ris->c_number = "RIS-{$year}-00" . $ris->id;
        $ris->save();

        $requestDetail = RequestDetail::find($id);
        $requestDetail->status = 12;
        $requestDetail->save();

        return redirect()->route('ris-bid.index');
    }

    // public function show() {

    //     $requests = RequestDetail::where('status', 11)->with('requestIssue')->get();

    //     return view('reports.ris.show', compact('requests'));
    // }

    public function edit($id) {

        $requests = RequestDetail::with('purchaseRequest', 'department', 'acceptanceInspection')->find($id);

        return view('reports-bidding.ris.edit', compact('requests'));
    }

    public function update(StoreRisRequest $request, $id) {
        RequestIssue::find($id)->update($request->validated());

        return redirect()->route('ris-bid.index');
    }

    public function delete($id, $rid) {

        RequestIssue::find($id)->delete($id);

        RequestDetail::find($rid)->update(['status' => 11]);

        return redirect()->back();
    }

}
