<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRegistrationRequest;
use App\Models\VehicleRegistration;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VehicleRegistrationController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\View\View
    //  */
    public function index(Request $request)
    {
        // dd($request->all());

        if($request->ajax()) {
            $data = VehicleRegistration::orderBy('created_at', 'desc')->select('vehicle_registrations.*');
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('edit', function() {
                return '<a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
            })
            // ->addColumn('type', function ($row) {
            //     if ($row->type == 0) {
            //         return '<span>4 Wheeler Plus</span>';
            //     } else {
            //         return '<span>Motor</span>';
            //     }
            // })
            ->filter(function($instance) use ($request) {
                if($request->get('type') == 0 || $request->get('type') == 1)  {
                    $instance->where('type', $request->get('type'));
                }
                if (!empty($request->get('search'))) {
                    $search = $request->get('search');
                    $instance->where('description', 'LIKE', "%$search%");
                }
            })
            ->rawColumns(['edit', 'type'])
            ->make(true);
        }

        $vehicles = VehicleRegistration::paginate();

        return view('staff.v-registration.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('staff.v-registration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRegistrationRequest $request)
    {

        VehicleRegistration::create($request->validated());

        return redirect()->route('vehicle.index');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\VehicleRegistration  $vehicleRegistration
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\VehicleRegistration  $vehicleRegistration
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
        $vehicle = VehicleRegistration::find($id);

        return view('staff.v-registration.edit', compact('vehicle', 'id'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\VehicleRegistration  $vehicleRegistration
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(StoreVehicleRegistrationRequest $request, $id)
    {
        VehicleRegistration::find($id)->update($request->validated());

        return redirect()->route('vehicle.index');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\VehicleRegistration  $vehicleRegistration
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        VehicleRegistration::find($id)->delete($id);

        return redirect()->route('vehicle.index');
    }
}
