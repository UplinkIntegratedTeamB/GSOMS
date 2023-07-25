<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePARRequest;
use App\Models\PropertyAcknowledgement;
use Illuminate\Http\Request;
use App\Models\RequestDetail;

class PARController extends Controller
{
    public function create($id) {

        $requests = RequestDetail::with('acceptanceInspection', 'department')->find($id);

        return view('reports.par.create', compact('requests', 'id'));
    }

    public function index() {

        $requests = RequestDetail::where('status', 10)->with('acceptanceInspection', 'department')->get();

        return view('reports.par.index', compact('requests'));
    }

    public function store(StorePARRequest $request ,$id) {

        PropertyAcknowledgement::create($request->validated() + ['request_detail_id' => $id]);

        $reqDetail = RequestDetail::find($id);
        $reqDetail->status = 11;
        $reqDetail->save();

        return redirect()->route('par.show');
    }

    public function show() {

        $pars = PropertyAcknowledgement::with('requestDetail')->get();

        return view('reports.par.show', compact('pars'));
    }

    public function edit($id) {

        $pars = PropertyAcknowledgement::with('requestDetail')->find($id);

        return view('reports.par.edit', compact('pars', 'id'));
    }

    public function update(StorePARRequest $request, $id) {

        PropertyAcknowledgement::find($id)->update($request->validated());

        return redirect()->route('par.show');
    }

    public function delete($id, $rid) {

        PropertyAcknowledgement::find($id)->delete($id);

        RequestDetail::find($rid)->update(['status' => 10]);

        return redirect()->back();
    }

}
