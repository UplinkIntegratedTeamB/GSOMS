<?php

namespace App\Http\Controllers;

use App\Models\AbstractCanvass;
use App\Models\AcceptanceInspection;
use App\Models\BacRes;
use App\Models\BiddingAbstract;
use App\Models\BiddingOffered;
use App\Models\BiddingOfferedItem;
use App\Models\BiddingPurchaseOrder;
use App\Models\BiddingResolution;
use App\Models\InventoryCustodian;
use App\Models\PropertyAcknowledgement;
use App\Models\PurchaseOrder;
use App\Models\Quotation;
use App\Models\RequestIssue;
use App\Models\TripTicket;
use Illuminate\Http\Request;
use App\Models\RequestDetail;
use Barryvdh\Snappy\Facades\SnappyPdf;

class PdfController extends Controller
{
    public function downloadPurchaseRequest(RequestDetail $request, $id)
    {

        $requestDetail = RequestDetail::with('procurementMode', 'user', 'user.department', 'department', 'purchaseRequest', 'purchaseRequest.item.itemType')->find($id);

        return SnappyPdf::loadView('pdf.pr-pdf', compact('requestDetail'))
            ->inline();
    }

    public function downloadBac($id)
    {

        $resolution = BacRes::with('requestDetail')->find($id);

        return SnappyPdf::loadView('pdf.bac-pdf', compact('resolution'))
            ->inline();
    }

    public function downloadRfq($id)
    {

        $rfq = Quotation::with('requestDetail', 'requestDetail.purchaseRequest.item.itemType')->find($id);

        return SnappyPdf::loadView('pdf.rfq-pdf', compact('rfq'))
            ->inline();
    }

    public function downloadAbstract($id)
    {
        $abstract = AbstractCanvass::with('requestDetail.endUserOffice', 'requestDetail.bacRes', 'requestDetail.purchaseRequest.item')
            ->where('request_detail_id', $id)->first();

        $abstracts = $abstract->load('supplierOffereds.supplierOfferedItems.item');

        return SnappyPdf::loadView('pdf.abstract-pdf', compact('abstracts'))
            ->inline();
    }

    public function downloadAward($id)
    {
        $awards = PurchaseOrder::with('requestDetail.abstractCanvass', 'requestDetail.bacRes', 'requestDetail.purchaseRequest.item.itemType')->find($id);

        return SnappyPdf::loadView('pdf.award-pdf', compact('awards'))
            ->inline();

    }
    public function downloadPo($id)
    {

        $pos = PurchaseOrder::with('requestDetail.abstractCanvass', 'requestDetail.bacRes', 'requestDetail.purchaseRequest.item.itemType')->find($id);

        return SnappyPdf::loadView('pdf.po-pdf', compact('pos'))
            ->inline();

    }

    public function downloadPar($id)
    {

        $pars = PropertyAcknowledgement::with('requestDetail.purchaseRequest.item.itemType')->where('request_detail_id', $id)->first();

        return SnappyPdf::loadView('pdf.par-pdf', compact('pars'))
            ->inline();
    }

    public function downloadAir($id)
    {
        $air = AcceptanceInspection::with('requestDetail.abstractCanvass', 'requestDetail.purchaseOrder', 'requestDetail.purchaseRequest.item.itemType')->where('request_detail_id', $id)->first();

        return SnappyPdf::loadView('pdf.air-pdf', compact('air'))
            ->inline();
    }

    public function downloadIcs($id)
    {
        $ics = InventoryCustodian::with('requestDetail.purchaseRequest.item.itemType')->where('request_detail_id', $id)->first();

        return SnappyPdf::loadView('pdf.ics-pdf', compact('ics'))
            ->inline();
    }

    public function downloadRis($id)
    {

        $ris = RequestIssue::with('requestDetail.purchaseRequest.item.itemType', 'requestDetail.department', 'requestDetail.acceptanceInspection')->where('request_detail_id', $id)->first();

        return SnappyPdf::loadView('pdf.ris-pdf', compact('ris'))
            ->inline();
    }

    public function downloadNtp($id)
    {

        $ntp = RequestDetail::with('biddingAbstract.winners', 'biddingResolution', 'biddingPurchaseOrder')->find($id);

        return SnappyPdf::loadView('bidding-pdf.ntp-pdf', compact('ntp'))
            ->inline();
    }

    public function downloadEligibility($id)
    {
        $res = BiddingPurchaseOrder::with('requestDetail.biddingAbstract.winners')->find($id);

        return SnappyPdf::loadView('bidding-pdf.eligibility-pdf', compact('res'))
            ->inline();
    }

    public function downloadNoa($id)
    {

        $awards = BiddingPurchaseOrder::with('requestDetail.biddingAbstract', 'requestDetail.biddingResolution', 'requestDetail.purchaseRequest.item.itemType')->find($id);

        return SnappyPdf::loadView('bidding-pdf.noa-pdf', compact('awards'))
            ->inline();
    }

    public function downloadQuoted($id)
    {

        $quotes = RequestDetail::with('purchaseRequest', 'biddingAbstract.winners', 'biddingAbstract.biddingOffereds.biddingOfferedItems')->find($id);
        $winner = $quotes->biddingAbstract->winner;
        $offered = BiddingOffered::where('bidding_abstract_id', $quotes->biddingAbstract->id)->where('supplier_id', $winner)->first();
        $items = BiddingOfferedItem::with('biddingOffered', 'item.unit')->where('bidding_offered_id', $offered->id)->get();

        return SnappyPdf::loadView('bidding-pdf.quoted-pdf', compact('quotes', 'items'))
            ->inline();
    }

    public function downloadIob($id)
    {

        $bids = RequestDetail::with('bidInvitation', 'department')->find($id);

        return SnappyPdf::loadView('bidding-pdf.iob', compact('bids'))
            ->inline();
    }

    public function downloadNopq($id)
    {

        $res = RequestDetail::with('biddingAbstract')->find($id);

        return SnappyPdf::loadView('bidding-pdf.nopq-pdf', compact('res'))
            ->inline();
    }

    public function downloadPqer($id)
    {

        $res = RequestDetail::with('department', 'division', 'biddingAbstract.winners', 'bidInvitation', 'biddingAbstract.biddingOffereds')->find($id);
        $count = $res->biddingAbstract->biddingOffereds->count();

        return SnappyPdf::loadView('bidding-pdf.pqer-pdf', compact('res', 'count'))
            ->inline();
    }

    public function downloadResolution($id)
    {

        $resolution = BiddingResolution::with('requestDetail.department', 'requestDetail.biddingAbstract.biddingOffereds')->find($id);
        $count = $resolution->requestDetail->biddingAbstract->biddingOffereds->count();
        $offers = BiddingAbstract::where('request_detail_id', $resolution->request_detail_id)->with('biddingOffereds.supplier', 'winners')->first();
        $gtotal = BiddingOffered::where('bidding_abstract_id', $offers->id)->where('supplier_id', $offers->winners->id)->first();

        return SnappyPdf::loadView('bidding-pdf.resolution-pdf', compact('resolution', 'count', 'offers', 'gtotal'))
            ->inline();
    }

    public function downloadbiddingPo($id)
    {
        $pos = BiddingPurchaseOrder::with('requestDetail.biddingAbstract', 'requestDetail.biddingResolution', 'requestDetail.purchaseRequest.item.itemType', 'requestDetail.acceptanceInspection')->find($id);
        $res = $pos->requestDetail;
        $winner = $res->biddingAbstract->winner;
        $offered = BiddingOffered::where('bidding_abstract_id', $res->biddingAbstract->id)->where('supplier_id', $winner)->first();
        $items = BiddingOfferedItem::with('biddingOffered', 'item.unit')->where('bidding_offered_id', $offered->id)->get();

        return SnappyPdf::loadView('bidding-pdf.po-pdf', compact('pos', 'items', 'offered'))
            ->inline();
    }

    public function downloadAttendance($id)
    {

        $bac = BiddingAbstract::with('attendance', 'biddingOffereds.supplier', 'requestDetail')->find($id);
        $count = $bac->biddingOffereds->count();

        return SnappyPdf::loadView('bidding-pdf.attendance-pdf', compact('id', 'bac', 'count'))
            ->setOption('page-size', 'Letter')
            ->inline();
    }

    public function downloadbiddingAir($id)
    {
        $air = AcceptanceInspection::with('requestDetail.abstractCanvass', 'requestDetail.purchaseOrder', 'requestDetail.purchaseRequest.item.itemType')->where('request_detail_id', $id)->first();

        return SnappyPdf::loadView('bidding-pdf.air-pdf', compact('air'))
            ->inline();
    }

    public function downloadbiddingRis($id)
    {

        $ris = RequestIssue::with('requestDetail.purchaseRequest.item.itemType', 'requestDetail.department', 'requestDetail.acceptanceInspection')->find($id);

        return SnappyPdf::loadView('bidding-pdf.ris', compact('ris'))
            ->inline();
    }

    public function downloadBiddingAbstract($id) {

         $abstract = BiddingAbstract::with('requestDetail.purchaseRequest.item', 'requestDetail.bidInvitation')->find($id);

        $abstracts = $abstract->load('biddingOffereds.biddingOfferedItems.item');

        return SnappyPdf::loadView('bidding-pdf.abstract', compact('abstracts'))
        ->inline();
    }

    public function downloadTripTicket($id, $gas) {

        $months = TripTicket::with('gasStation', 'month')
            ->where('month_id', $id)
            ->where('gas_station_id', $gas)
            ->get();

        $pdf = SnappyPdf::loadView('staff.tripTicket_pdf.tripticket', compact('months'));
        $pdf->setPaper('a4', 'landscape'); // Set paper size and orientation
        return $pdf->inline();
    }

    public function downloadTripTicketDriver($id) {

        $tickets = TripTicket::with('vehicleRegistration')->find($id);
        $ticketId = sprintf("%04d", $tickets->id);

        return SnappyPdf::loadView('staff.tripTicket_pdf.driver', compact('tickets', 'ticketId'))
            ->inline();
    }

    public function downloadBoq($id) {

        $request = RequestDetail::with('purchaseRequest.item.unit', 'department')->find($id);

        return SnappyPdf::loadView('bidding-pdf.boq', compact('request'))
            ->inline();
    }

}
