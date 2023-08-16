<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupplierRequest;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        $inventories = Item::with('supplier')->get();

        return view('staff.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        $inventories = Item::all();
        $classTypes = ClassType::paginate();

        $pr_count = Supplier::max('id');


        if (is_null($pr_count)) {
            $pr_count = 0;
        } else {
            $pr_count++;
        }

        $formated_count = sprintf("%04d", $pr_count);

        $year = date('Y');
        $month = date('m');
        $day = date('d');

        // Add 1 year to current date
        $exp = date('Y-m-d', strtotime("+1 year", strtotime("$year-$month-$day")));

        $date = "{$year}-{$formated_count}";

        return view('staff.supplier.create', compact('inventories', 'date', 'exp', 'classTypes'));
    }

    public function store(StoreSupplierRequest $request)
    {
        $supplier = Supplier::create($request->validated());


        return redirect()->route('suppliers.index');
    }

    public function show($id)
    {
        $supplier = Supplier::with('classType')->where('id', $id)->first();

        $classTypes = ClassType::paginate();


        return view('staff.supplier.update', compact('supplier', 'classTypes', 'id'));
    }

    public function update(Request $request, $id)
    {

        $supplier = Supplier::where('id', $id)->first();

        $update = $supplier->update($request->except('item', '_token'));

        $supplier->item()->sync($request->item);

        return redirect()->route('suppliers.index');
    }

    public function delete($id) {
        Supplier::find($id)->delete();

        return redirect()->back();
    }

}
