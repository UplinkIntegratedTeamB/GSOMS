<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRisRequest;
use App\Models\RequestDetail;
use App\Models\RequestIssue;
use Illuminate\Http\Request;

class RISController extends Controller
{
    public function create($id) {

        $requests = RequestDetail::with('purchaseRequest', 'department', 'acceptanceInspection')->find($id);

        $year = date('Y');
        $date = "RIS-{$year}-XXXX";

        return view('reports.ris.create', compact('requests', 'date', 'id' ));
    }

    public function index() {

        $requests = RequestDetail::with('purchaseRequest', 'department', 'acceptanceInspection')->where('procurement_mode_id', 2)->where('status', 10)->get();

        return view('reports.ris.index', compact('requests', ));
    }

    public function store(StoreRisRequest $request, $id) {


        $year = date('Y');

        $ris = RequestIssue::create($request->validated() + ['request_detail_id' => $id]);
        $formated_count = sprintf("%04d", $ris->id);
        $ris->c_number = "RIS-{$year}-{$formated_count}";
        $ris->save();

        $requestDetail = RequestDetail::find($id);
        $requestDetail->status = 11;
        $requestDetail->save();

        return redirect()->route('ris.show');
    }

    public function show() {

        // $requests = RequestDetail::with('requestIssue')
        //     ->where('procurement_mode_id', 2)
        //     ->whereHas('requestIssue')
        //     ->get();

        $requests = RequestIssue::with('requestDetail.department')->get();

        return view('reports.ris.show', compact('requests'));
    }

    public function edit($id) {

        $requests = RequestDetail::with('purchaseRequest', 'department', 'acceptanceInspection')->find($id);

        return view('reports.ris.edit', compact('requests'));
    }

    public function update(StoreRisRequest $request, $id) {
        RequestIssue::find($id)->update($request->validated());

        return redirect()->route('ris.show');
    }

    public function delete($id, $rid) {

        RequestIssue::find($id)->delete($id);

        RequestDetail::find($rid)->update(['status' => 10]);

        return redirect()->back();
    }

}
