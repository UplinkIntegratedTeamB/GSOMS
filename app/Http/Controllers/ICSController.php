<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreICSRequest;
use App\Models\InventoryCustodian;
use App\Models\RequestDetail;
use Illuminate\Http\Request;

class ICSController extends Controller
{
    public function create($id)
    {

        $ics = RequestDetail::find($id);

        return view('reports.ics.create', compact('ics', 'id'));
    }

    public function index()
    {

        $requests = RequestDetail::with('purchaseRequest', 'department', 'acceptanceInspection')->has('acceptanceInspection')->where('status', 10)->get();

        return view('reports.ics.index', compact('requests'));
    }

    public function store(StoreICSRequest $request, $id)
    {

        InventoryCustodian::create($request->validated() + ['request_detail_id' => $id]);

        $request = RequestDetail::find($id);
        $request->status = 11;
        $request->save();

        return redirect()->route('ics.show');
    }

    public function show()
    {

        $requests = RequestDetail::with('inventoryCustodian', 'department')
            ->where('procurement_mode_id', 2)
            ->whereHas('inventoryCustodian') // Add this line to filter based on InventoryCustodian
            ->get();

        return view('reports.ics.show', compact('requests'));
    }

    public function edit($id)
    {

        $ics = InventoryCustodian::with('requestDetail')->find($id);

        return view('reports.ics.edit', compact('ics', 'id'));
    }

    public function update(StoreICSRequest $request, $id)
    {

        InventoryCustodian::find($id)->update($request->validated());

        return redirect()->route('ics.show');
    }

    public function delete($id, $rid)
    {

        InventoryCustodian::find($id)->delete($id);

        RequestDetail::find($rid)->update(['status' => 10]);

        return redirect()->back();
    }

}
