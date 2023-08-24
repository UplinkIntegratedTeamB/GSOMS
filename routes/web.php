<?php

use App\Http\Controllers\BiddingAIRController;
use App\Http\Controllers\BiddingRISController;
use App\Http\Controllers\BidInvitationController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\TripTicketController;
use App\Http\Controllers\VehicleRegistrationController;
use App\Models\Division;
use App\Models\Section;
use App\Models\BiddingAbstract;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIRController;
use App\Http\Controllers\BacController;
use App\Http\Controllers\ICSController;
use App\Http\Controllers\PARController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RFQController;
use App\Http\Controllers\RISController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BiddingController;
use App\Http\Controllers\AbstractController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BiddingPOController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\BiddingAbstractController;
use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\BiddingResolutionController;
use App\Http\Controllers\ObligationRequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Inventory
    Route::get('item', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('item/create', [InventoryController::class, 'create'])->name('inventory.create');
    Route::get('item/{item}', [InventoryController::class, 'show'])->name('inventory.show');

    Route::view('about', 'about')->name('about');

    // Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    // Purchase Request
    Route::get('purchase-request/json/{id}', [PurchaseRequestController::class, 'pr'])->name('purchaseRequest.pr');
    Route::get('purchase-request/view/{id}', [PurchaseRequestController::class, 'preview'])->name('purchaseRequest.preview');
    Route::get('purchase-request/edit/{id}', [PurchaseRequestController::class, 'edit'])->name('purchaseRequest.edit');
    Route::get('purchase-request/editPr/{id}', [PurchaseRequestController::class, 'editPr'])->name('purchaseRequest.editPr');
    Route::get('purchase-request/remove/{id}', [PurchaseRequestController::class, 'removePr'])->name('purchaseRequest.removePr');
    Route::get('purchase-request/delete/{id}/{grand}', [PurchaseRequestController::class, 'removeItem'])->name('purchaseRequest.remove');
    Route::get('purchase-request/completedPr', [PurchaseRequestController::class, 'completedPr'])->name('purchaseRequest.completedPr');
    Route::get('purchase-request/completedPrUser', [PurchaseRequestController::class, 'completedPrUser'])->name('purchaseRequest.completedPrUser');
    Route::post('purchase-request/update/{id}', [PurchaseRequestController::class, 'update'])->name('purchase-request.update');
    Route::get('purchase-request/cancel/{id}', [PurchaseRequestController::class, 'cancel'])->name('purchase-request.cancel');
    Route::resource('purchase-request', PurchaseRequestController::class)
        ->only('index', 'show', 'store');

    // Divisions
    Route::get('/divisions/{division}/sections', function ($division) {
        $sections = Section::where('division_id', $division)->get();
        return response()->json($sections);
    });

    Route::get('/departments/{id}/divisions', function ($id) {
        $divisions = Division::where('department_id', $id)->get();
        return response()->json($divisions);
    });

    // Inventory
    Route::get('item', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('item/{item}', [InventoryController::class, 'show'])->name('inventory.show');

    // Admin
    Route::middleware('role:admin')->group(function () {

        // Users
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::post('users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('users/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('users/delete/{user}', [UserController::class, 'delete'])->name('users.delete');
    });

    // Head Staff
    Route::middleware('role:headstaff')->group(function () {
        Route::get('purchase-request/approved/{id}/{uid}', [PurchaseRequestController::class, 'approve'])->name('purchaseRequest.approved');

    });

    // Staff
    Route::middleware('role:staff')->group(function () {

        // START OF SHOPPING PROCESS

        // BAC RESOLUTION
        Route::get('bac/{id}/create', [BacController::class, 'create'])->name('bac.create');
        Route::post('bac/{id}/store', [BacController::class, 'store'])->name('bac.store');
        Route::get('bac', [BacController::class, 'index'])->name('bac.index');
        Route::get('bac/{id}/edit', [BacController::class, 'edit'])->name('bac.edit');
        Route::post('bac/{id}/update', [BacController::class, 'update'])->name('bac.update');
        Route::get('bac/{id}/{rid}/delete', [BacController::class, 'delete'])->name('bac.delete');

        // RFQ
        Route::get('rfq/{id}/create', [RFQController::class, 'create'])->name('rfq.create');
        Route::post('rfq/{id}/store', [RFQController::class, 'store'])->name('rfq.store');
        Route::get('rfq/', [RFQController::class, 'index'])->name('rfq.index');
        Route::get('rfq/{id}/edit', [RFQController::class, 'edit'])->name('rfq.edit');
        Route::post('rfq/{id}/update', [RFQController::class, 'update'])->name('rfq.update');
        Route::get('rfq/{id}/{rid}/delete', [RFQController::class, 'delete'])->name('rfq.delete');

        // Purchase Order
        Route::get('po/{id}/create', [PurchaseOrderController::class, 'create'])->name('po.create');
        Route::post('po/{id}/store', [PurchaseOrderController::class, 'store'])->name('po.store');
        Route::post('po/{id}/update', [PurchaseOrderController::class, 'update'])->name('po.update');
        Route::get('po/', [PurchaseOrderController::class, 'index'])->name('po.index');
        Route::get('po/{id}/edit', [PurchaseOrderController::class, 'edit'])->name('po.edit');
        Route::get('po/{id}/{rid}/delete', [PurchaseOrderController::class, 'delete'])->name('po.delete');

        // ABSTRACT
        Route::get('abstract/{id}/create', [AbstractController::class, 'create'])->name('abstract.create');
        Route::get('abstract', [AbstractController::class, 'index'])->name('abstract.index');
        Route::get('abstract/{id}/show', [AbstractController::class, 'show'])->name('abstract.show');
        Route::get('abstract/{id}/{rid}/delete', [AbstractController::class, 'delete'])->name('abstract.delete');
        Route::post('abstract/{id}/store', [AbstractController::class, 'store'])->name('abstract.store');
        Route::post('abstract/{id}/supplier', [AbstractController::class, 'addSupplier'])->name('abstract.addSupplier');
        Route::post('abstract/{id}', [AbstractController::class, 'update'])->name('abstract.update');
        Route::get('abstract/{id}/remove', [AbstractController::class, 'removeItem'])->name('abstract.removeItem');
        Route::get('abstract/{id}/compute', [AbstractController::class, 'compute'])->name('abstract.compute');
        Route::get('abstract/{abstractCanvass}', [AbstractController::class, 'view'])->name('abstract.view');

        // AIR
        Route::get('air/{id}/create', [AIRController::class, 'create'])->name('air.create');
        Route::post('air/{id}/store', [AIRController::class, 'store'])->name('air.store');
        Route::post('air/{id}/update', [AIRController::class, 'update'])->name('air.update');
        Route::get('air/', [AIRController::class, 'index'])->name('air.index');
        Route::get('air/{id}/edit', [AIRController::class, 'edit'])->name('air.edit');
        Route::get('air/{id}/{rid}', [AIRController::class, 'delete'])->name('air.delete');

        // ICS
        Route::get('ics/{id}/create', [ICSController::class, 'create'])->name('ics.create');
        Route::get('ics', [ICSController::class, 'index'])->name('ics.index');
        Route::get('ics/show', [ICSController::class, 'show'])->name('ics.show');
        Route::get('ics/{id}/edit', [ICSController::class, 'edit'])->name('ics.edit');
        Route::post('ics/{id}/store', [ICSController::class, 'store'])->name('ics.store');
        Route::post('ics/{id}/update', [ICSController::class, 'update'])->name('ics.update');
        Route::get('ics/{id}/{rid}/delete', [ICSController::class, 'delete'])->name('ics.delete');

        // RIS
        Route::get('ris/{id}/create', [RISController::class, 'create'])->name('ris.create');
        Route::get('ris', [RISController::class, 'index'])->name('ris.index');
        Route::get('ris/show', [RISController::class, 'show'])->name('ris.show');
        Route::get('ris/{id}/edit', [RISController::class, 'edit'])->name('ris.edit');
        Route::post('ris/{id}/store', [RISController::class, 'store'])->name('ris.store');
        Route::post('ris/{id}/update', [RISController::class, 'update'])->name('ris.update');
        Route::get('ris/{id}/{rid}/delete', [RISController::class, 'delete'])->name('ris.delete');

        // PAR
        Route::get('par/{id}/create', [PARController::class, 'create'])->name('par.create');
        Route::get('par', [PARController::class, 'index'])->name('par.index');
        Route::get('par/show', [PARController::class, 'show'])->name('par.show');
        Route::post('par/{id}/store', [PARController::class, 'store'])->name('par.store');
        Route::post('par/{id}/update', [PARController::class, 'update'])->name('par.update');
        Route::get('par/{id}/edit', [PARController::class, 'edit'])->name('par.edit');
        Route::get('par/{id}/{rid}/delete', [PARController::class, 'delete'])->name('par.delete');

        // END OF SHOPPING PROCESS


        // START OF BIDDING PROCESS

        // ABSTRACT OF BID
        Route::get('abstract-bid/{id}/create', [BiddingAbstractController::class, 'create'])->name('abstract-bid.create');
        Route::get('abstract-bid/{biddingAbstract}', [BiddingAbstractController::class, 'view'])->name('abstract-bid.view');
        Route::post('abstract-bid/{id}/store', [BiddingAbstractController::class, 'store'])->name('abstract-bid.store');
        Route::get('abstract-bid/{id}/show', [BiddingAbstractController::class, 'show'])->name('abstract-bid.show');
        Route::post('abstract-bid/{id}', [BiddingAbstractController::class, 'update'])->name('abstract-bid.update');
        Route::post('abstract-bid/{id}/supplier', [BiddingAbstractController::class, 'addSupplier'])->name('abstract-bid.addSupplier');
        Route::get('abstract-bid/{id}/compute', [BiddingAbstractController::class, 'compute'])->name('abstract-bid.compute');
        Route::get('abstract-bid/{id}/remove', [BiddingAbstractController::class, 'removeItem'])->name('abstract-bid.removeItem');
        Route::get('abstract-bid', [BiddingAbstractController::class, 'index'])->name('abstract-bid.index');
        Route::get('abstract-bid/{id}/{rid}/delete', [BiddingAbstractController::class, 'delete'])->name('abstract-bid.delete');
        Route::get('abstract-bid/attendance/{id}', [BiddingAbstractController::class, 'attendance'])->name('abstract-bid.attendance');
        Route::get('abstract-bid/attendance/{id}/{rid}', [BiddingAbstractController::class, 'addAttendance'])->name('abstract-bid.addAttendance');

        //RESOLUTION
        Route::get('resolution-bid/{id}', [BiddingResolutionController::class, 'create'])->name('resolution-bid.create');
        Route::get('resolution-bid', [BiddingResolutionController::class, 'index'])->name('resolution-bid.index');
        Route::get('resolution-bid/{id}/edit', [BiddingResolutionController::class, 'edit'])->name('resolution-bid.edit');
        Route::post('resolution-bid/{id}', [BiddingResolutionController::class, 'store'])->name('resolution-bid.store');
        Route::post('resolution-bid/{id}/update', [BiddingResolutionController::class, 'update'])->name('resolution-bid.update');
        Route::get('resolution-bid/{id}/delete', [BiddingResolutionController::class, 'delete'])->name('resolution-bid.delete');

        //PURCHASE ORDER BIDDING
        Route::get('po-bid/{id}', [BiddingPOController::class, 'create'])->name('po-bid.create');
        Route::get('po-bid', [BiddingPOController::class, 'index'])->name('po-bid.index');
        Route::get('po-bid/{id}/edit', [BiddingPOController::class, 'edit'])->name('po-bid.edit');
        Route::get('po-bid/{id}/{rid}/delete', [BiddingPOController::class, 'delete'])->name('po-bid.delete');
        Route::post('po-bid/{id}', [BiddingPOController::class, 'store'])->name('po-bid.store');
        Route::post('po-bid/{id}/update', [BiddingPOController::class, 'update'])->name('po-bid.update');

        // ACCEPTANCE INSPECTION REPORT
        Route::get('air-bid/{id}', [BiddingAIRController::class, 'create'])->name('air-bid.create');
        Route::get('air-bid', [BiddingAIRController::class, 'index'])->name('air-bid.index');
        Route::get('air-bid/{id}/edit', [BiddingAIRController::class, 'edit'])->name('air-bid.edit');
        Route::post('air-bid/{id}', [BiddingAIRController::class, 'store'])->name('air-bid.store');
        Route::post('air-bid/{id}/update', [BiddingAIRController::class, 'update'])->name('air-bid.update');
        Route::get('air/{id}/{rid}/delete', [BiddingAIRController::class, 'delete'])->name('air-bid.delete');

        // RIS
        Route::get('ris-bid/{id}/create', [BiddingRISController::class, 'create'])->name('ris-bid.create');
        Route::get('ris-bid', [BiddingRISController::class, 'index'])->name('ris-bid.index');
        // Route::get('ris-bid/show', [RISController::class, 'show'])->name('ris-bid.show');
        Route::get('ris-bid/{id}/edit', [BiddingRISController::class, 'edit'])->name('ris-bid.edit');
        Route::post('ris-bid/{id}/store', [BiddingRISController::class, 'store'])->name('ris-bid.store');
        Route::post('ris-bid/{id}/update', [BiddingRISController::class, 'update'])->name('ris-bid.update');
        Route::get('ris-bid/{id}/{rid}/delete', [BiddingRISController::class, 'delete'])->name('ris-bid.delete');

        // Invitation of Bid
        Route::get('invitation/{id}', [BidInvitationController::class, 'create'])->name('invitation.create');
        Route::get('invitation', [BidInvitationController::class, 'index'])->name('invitation.index');
        Route::post('invitation/{id}', [BidInvitationController::class, 'store'])->name('invitation.store');
        Route::get('invitation-bid/{id}', [BidInvitationController::class, 'edit'])->name('invitation-bid.edit');
        Route::post('invitation-bid/{invitationBid}', [BidInvitationController::class, 'update'])->name('invitation-bid.update');
        Route::get('invitation-bid/{invitationBid}/delete', [BidInvitationController::class, 'destroy'])->name('invitation-bid.destroy');

        // END OF BIDDING

        // Supplier
        Route::resource('suppliers', SupplierController::class)
            ->only('store', 'create');

        Route::get('suppliers/edit/{id}', [SupplierController::class, 'show'])->name('suppliers.edit');
        Route::get('suppliers/delete/{id}', [SupplierController::class, 'delete'])->name('suppliers.delete');
        Route::post('suppliers/update/{id}', [SupplierController::class, 'update'])->name('suppliers.update');

        //Inventory
        Route::get('inventory/edit/{id}', [InventoryController::class, 'update'])->name('inventory.edit');
        Route::post('inventory/update/{id}', [InventoryController::class, 'updateData'])->name('inventory.update');
        Route::resource('item', InventoryController::class)
            ->only('create', 'store');

        // Purchase Request
        Route::get('purchase-request/approve/{id}/{uid}', [PurchaseRequestController::class, 'approve'])->name('purchaseRequest.approve');
        Route::get('purchase-request/{id}/complete', [PurchaseRequestController::class, 'complete'])->name('purchaseRequest.complete');

        // ItemType
        Route::post('itemType/update/{id}', [ItemTypeController::class, 'update'])->name('itemType.update');
        Route::get('itemType/destroy/{id}', [ItemTypeController::class, 'destroy'])->name('itemType.destroy');
        Route::resource('itemType', ItemTypeController::class)->except('show', 'destroy', 'update');

        // VEHICLE REGISTRATION
        Route::resource('vehicle', VehicleRegistrationController::class);
        // Route::get('vehicle', [VehicleRegistrationController::class, 'index'])->name('vehicle.index');

        // Trip Ticket
        Route::resource('trip-ticket', TripTicketController::class);

    });

    // User
    Route::middleware('role:user')->group(function () {

    });

    // Supplier Public
    Route::get('suppliers', [SupplierController::class, 'index'])->name('suppliers.index');

    //SHOPPING PDF
    Route::get('/pdf/pr/{id}', [PdfController::class, 'downloadPurchaseRequest'])->name('pdf.download');
    Route::get('/pdf/bac/{id}', [PdfController::class, 'downloadBac'])->name('pdf.bac');
    Route::get('/pdf/rfq/{id}', [PdfController::class, 'downloadRfq'])->name('pdf.rfq');
    Route::get('/pdf/abstract/{id}', [PdfController::class, 'downloadAbstract'])->name('pdf.abstract');
    Route::get('/pdf/award/{id}', [PdfController::class, 'downloadAward'])->name('pdf.award');
    Route::get('/pdf/po/{id}', [PdfController::class, 'downloadPo'])->name('pdf.po');
    Route::get('/pdf/air/{id}', [PdfController::class, 'downloadAir'])->name('pdf.air');
    Route::get('/pdf/par/{id}', [PdfController::class, 'downloadPar'])->name('pdf.par');
    Route::get('/pdf/ics/{id}', [PdfController::class, 'downloadIcs'])->name('pdf.ics');
    Route::get('/pdf/ris/{id}', [PdfController::class, 'downloadRis'])->name('pdf.ris');

    // BIDDING PDF
    Route::get('/pdf/ntp/{id}', [PdfController::class, 'downloadNtp'])->name('pdf.ntp');
    Route::get('/pdf/attendance/{id}', [PdfController::class, 'downloadAttendance'])->name('pdf.attendance');
    Route::get('/pdf/resolution{id}', [PdfController::class, 'downloadResolution'])->name('pdf.resolution');
    Route::get('/pdf/eligibility/{id}', [PdfController::class, 'downloadEligibility'])->name('pdf.eligibility');
    Route::get('/pdf/noa/{id}', [PdfController::class, 'downloadNoa'])->name('pdf.noa');
    Route::get('/pdf/quoted/{id}', [PdfController::class, 'downloadQuoted'])->name('pdf.quoted');
    Route::get('/pdf/iob/{id}', [PdfController::class, 'downloadIob'])->name('pdf.iob');
    Route::get('/pdf/nopq/{id}', [PdfController::class, 'downloadNopq'])->name('pdf.nopq');
    Route::get('/pdf/pqer/{id}', [PdfController::class, 'downloadPqer'])->name('pdf.pqer');
    Route::get('/pdf/po-bidding/{id}', [PdfController::class, 'downloadbiddingPo'])->name('pdf.biddingPo');
    Route::get('/pdf/air-bidding/{id}', [PdfController::class, 'downloadbiddingAir'])->name('pdf.biddingAir');
    Route::get('/pdf/ris-bidding/{id}', [PdfController::class, 'downloadbiddingRis'])->name('pdf.biddingRis');
    Route::get('/pdf/abstract-bidding/{id}', [PdfController::class, 'downloadBiddingAbstract'])->name('pdf.biddingAbstract');
    Route::get('/pdf/trip-ticket/{id}/{gas}', [PdfController::class, 'downloadTripTicket'])->name('pdf.tripTicket');
    Route::get('/pdf/driver/{id}', [PdfController::class, 'downloadTripTicketDriver'])->name('pdf.driver');
    Route::get('/pdf/bill/{id}', [PdfController::class, 'downloadBoq'])->name('pdf.boq');

});
