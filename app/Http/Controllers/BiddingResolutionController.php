<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBiddingResolution;
use App\Models\BiddingOffered;
use App\Models\BiddingResolution;
use App\Models\RequestDetail;
use Illuminate\Http\Request;

class BiddingResolutionController extends Controller
{
    public function create($id) {

        $request = RequestDetail::with('department', 'biddingAbstract.winners')->find($id);

        $bid = $request->biddingAbstract->id;
        $winner = $request->biddingAbstract->winner;
        $grandTotal = BiddingOffered::where('bidding_abstract_id', $bid)->where('supplier_id', $winner)->first();

        $year = date('Y');
        $cFormat = "BR-{$year}-XXXX";

        return view('reports-bidding.resolution.create', compact('cFormat', 'request', 'id', 'grandTotal'));
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
        $request = BiddingResolution::with('requestDetail.department', 'requestDetail.biddingAbstract.winners')->find($id);
        $req = $request->requestDetail;
        $winner = $req->biddingAbstract->winner;
        $grandTotal = BiddingOffered::where('bidding_abstract_id', $req->biddingAbstract->id)->where('supplier_id', $winner)->first();

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
