<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Month;
use App\Models\Division;
use App\Models\Supplier;
use App\Models\Department;
use App\Models\TripTicket;
use App\Models\VehicleRegistration;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTripTicketRequest;

class TripTicketController extends Controller
{
    public function create() {

        $departments = Department::with('divisions')->get();
        $suppliers = Supplier::all();
        $items = VehicleRegistration::all();
        $months = Month::all();

        return view('staff.tripTicket.create', compact('departments', 'suppliers', 'items', 'months'));
    }

    public function store(StoreTripTicketRequest $request) {

        TripTicket::create($request->validated());

        return redirect()->route('trip-ticket.index');
    }


    public function index() {

        $trips = TripTicket::with('department', 'supplier', 'month')->get();
        $months = Month::all();

        return view('staff.tripTicket.index', compact('trips', 'months'));
    }

    public function edit(TripTicket $tripTicket) {

        $departments = Department::with('divisions')->get();
        $suppliers = Supplier::all();
        $items = Item::all();
        $months = Month::all();

        return view('staff.tripTicket.edit', compact('tripTicket', 'departments', 'suppliers', 'items', 'months'));
    }

    public function update(TripTicket $tripTicket, StoreTripTicketRequest $request) {

        $tripTicket->update($request->validated());

        return redirect()->route('trip-ticket.index');
    }

    public function destroy(TripTicket $tripTicket) {

        $tripTicket->delete();

        return redirect()->route('trip-ticket.index');
    }

}
