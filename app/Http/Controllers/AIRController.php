<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAirRequest;
use App\Models\AcceptanceInspection;
use App\Models\RequestDetail;
use Illuminate\Http\Request;

class AIRController extends Controller
{
    public function create($id) {

        $details = RequestDetail::with('purchaseOrder', 'purchaseRequest', 'department', 'division', 'section', 'abstractCanvass')->find($id);

        $year = date('Y');
        $date = "AIR-{$year}-XXXX";

        return view('reports.air.create', compact('details', 'date', 'id'));
    }

    public function store(StoreAirRequest $request, $id) {
        $year = date('Y');

        $air =  AcceptanceInspection::create($request->validated() + ['request_detail_id' => $id]);
        $formated_count = sprintf("%04d", $air->id);
        $air->c_number = "AIR-{$year}-{$formated_count}";
        $air->save();

        $bac = RequestDetail::find($id);
        $bac->status = 10;
        $bac->save();

        return redirect()->route('air.index');
    }

    public function index() {
        $airs = RequestDetail::with('acceptanceInspection')->where('procurement_mode_id', 2 )->get();

        return view('reports.air.index', compact('airs'));
    }

    public function edit($id) {

        $details = RequestDetail::with('purchaseOrder', 'purchaseRequest', 'department', 'division', 'section', 'abstractCanvass', 'acceptanceInspection')->find($id);

        return view('reports.air.edit', compact('details', 'id'));
    }

    public function update(StoreAirRequest $request, $id) {

        AcceptanceInspection::find($id)->update($request->validated());

        return redirect()->route('air.index');
    }

    public function delete($id, $rid) {

        AcceptanceInspection::find($id)->delete($id);

        RequestDetail::find($rid)->update(['status' => 9]);

        return redirect()->back();
    }

}
