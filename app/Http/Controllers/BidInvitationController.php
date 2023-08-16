<?php

namespace App\Http\Controllers;

use App\Models\RequestDetail;
use Illuminate\Http\Request;
use App\Models\BidInvitation;
use App\Http\Requests\StoreBidInvitationRequest;

class BidInvitationController extends Controller
{
    public function index() {

        $invitations = BidInvitation::paginate();

        return view('reports-bidding.invitation.index', compact('invitations'));
    }

    public function create($id) {

        return view('reports-bidding.invitation.create', compact('id'));
    }

    public function store(StoreBidInvitationRequest $request, $id) {

        $year = date('Y');

        $invitation = BidInvitation::create($request->validated() + ['request_detail_id' => $id]);
        $good = sprintf("%04d", $invitation->id);
        $invitation->good = "{$good}-{$year}";
        $invitation->save();

        $pr = RequestDetail::find($id);
        $pr->status = 6;
        $pr->save();

        return redirect()->route('invitation.index');
    }

    public function edit($id) {

        $bidInvitation = BidInvitation::find($id);

        return view('reports-bidding.invitation.edit', compact('bidInvitation'));
    }

    public function update(StoreBidInvitationRequest $request,$id)
    {
        BidInvitation::find($id)->update($request->validated());

        return redirect()->route('invitation.index');
    }

    public function destroy($id) {

        BidInvitation::find($id)->delete($id);

        RequestDetail::find($id)->update(['status' => 5]);

        return redirect()->route('invitation.index');
    }

}
