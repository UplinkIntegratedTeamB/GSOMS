<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBiddingResolution;
use App\Models\BiddingResolution;
use App\Models\RequestDetail;
use Illuminate\Http\Request;

class BiddingResolutionController extends Controller
{
    public function create($id) {

        $request = RequestDetail::with('department')->find($id);

        $year = date('Y');
        $cFormat = "BR-{$year}-XXXX";

        return view('reports-bidding.resolution.create', compact('cFormat', 'request', 'id'));
    }

    public function store(StoreBiddingResolution $request, $id) {
        $year = date('Y');

        $resolution = BiddingResolution::create($request->validated() + ['request_detail_id' => $id]);
        $formated_count = sprintf("%04d", $resolution->id);
        $resolution->c_number = "BR-{$year}-{$formated_count}";
        $resolution->save();

        RequestDetail::find($id)->update(['status' => 9]);

        return redirect()->route('resolution-bid.index');
    }

    public function index() {

        $resolutions = BiddingResolution::with('requestDetail')->paginate();

        return view('reports-bidding.resolution.index', compact('resolutions'));
    }

    public function edit($id) {
        $request = BiddingResolution::with('requestDetail.department')->find($id);

        return view('reports-bidding.resolution.edit', compact('id', 'request'));
    }

    public function update(StoreBiddingResolution $request, $id) {
        $bac = BiddingResolution::find($id);
        $bac->update($request->validated());

        return redirect()->route('resolution-bid.index');
    }

    public function delete($id) {
        BiddingResolution::find($id)->delete($id);

        return redirect()->back();
    }

}
