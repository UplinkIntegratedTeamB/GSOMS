<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Unit;
use App\Models\Category;
use App\Models\ItemType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ItemRequest;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::paginate();

        if ($request->ajax()) {
            $data = Item::with('itemType', 'unit')->orderBy('created_at', 'desc')->select('items.*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="clickable" data-id="' . $data->id . '" />';
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="' . route('inventory.edit', $data->id) . '" class="btn btn-primary">Edit</a>';
                })
                ->addColumn('category_id', function ($row) {
                    if ($row->category_id == 1) {
                        return '<span>Consumables</span>';
                    } elseif ($row->category_id == 2) {
                        return '<span>Fixed Asset</span>';
                    } else {
                        return '<span>Semi-Expendables</span>';
                    }
                })
                ->addColumn('item_type_id', function ($row) {
                    return $row->itemType->type;
                })
                ->addColumn('unit_id', function ($row) {
                    return $row->unit->description;
                })
                ->setRowClass(function ($inventory) {
                    return 'inventory_item';
                })
                ->setRowAttr([
                    'data-id' => function ($inventory) {
                        return $inventory->id;
                    },
                ])
                ->filter(function ($instance) use ($request) {
                    if ($request->get('category_id') == 1 || $request->get('category_id') == 2 || $request->get('category_id') == 3) {
                        $instance->where('category_id', $request->get('category_id'));
                    }
                    if (!empty($request->get('unit'))) {
                        $unit = $request->get('unit');
                        $instance->whereHas('itemType', function ($query) use ($unit) {
                            $query->where('type', 'LIKE', "%$unit%");
                        });
                    }
                    if (!empty($request->get('search'))) {
                        $search = $request->get('search');
                        $instance->where('description', 'LIKE', "%$search%");
                    }
                })

                ->rawColumns(['category_id', 'checkbox', 'edit', 'item_type_id'])
                ->make(true);
        }

        $items = Item::with('itemType', 'unit')->get();

        if(auth()->user()->hasRole('staff')) {
            return view('staff.inventory.index', compact('categories', 'items'));
        } else {
            return view('user.inventory.index', compact('categories'));
        }
    }

    public function show(Item $item): JsonResponse
    {
        $itemType = ItemType::find($item->item_type_id);
        $item->itemType = $itemType;
        $item->load('unit');
        return response()->json($item);
    }

    public function create()
    {
        $categories = Category::all();
        $itemTypes = ItemType::all();
        $units = Unit::all();
        return view('staff.inventory.create', compact('categories', 'itemTypes', 'units'));
    }

    public function store(ItemRequest $request)
    {
        Item::create($request->validated());

        return redirect()->route('inventory.index');
    }

    public function update($id = null)
    {
        $inventory = Item::find($id);
        $categories = Category::all();
        $itemTypes = ItemType::all();
        $categories_selected = Category::where('id', $inventory->category_id)->get();
        $units = Unit::all();

        return view('staff.inventory.update', compact('inventory', 'categories', 'categories_selected', 'itemTypes', 'units'));
    }

    public function updateData(ItemRequest $request, $id)
    {
        $inventory = Item::where('id', $id)
            ->update($request->validated());

        return redirect()->route('inventory.index');
    }

}
