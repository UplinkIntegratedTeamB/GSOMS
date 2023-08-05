<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemTypeRequest;
use App\Models\Category;
use App\Models\ItemType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    public function index() {

        $types = ItemType::orderByDesc('created_at')->get();

        return view('staff.itemType.index', compact('types'));
    }

    public function create() {

        $categories = Category::all();

        return view('staff.itemType.create', compact('categories'));
    }

    public function store(StoreItemTypeRequest $request) {

        ItemType::create($request->validated());

        return redirect()->route('itemType.index');
    }

    public function edit(ItemType $itemType) {

        $categories = Category::all();

        return view('staff.itemType.edit', compact('itemType', 'categories'));
    }

    public function update(StoreItemTypeRequest $request ,$id) {

        ItemType::find($id)->update($request->validated());

        return redirect()->route('itemType.index');
    }

    public function destroy($id) : RedirectResponse
    {
        ItemType::find($id)->delete($id);

        return redirect()->back();
    }

}
