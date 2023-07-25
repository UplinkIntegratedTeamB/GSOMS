<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemType;
use App\Models\User;
use App\Models\Section;
use App\Models\Category;
use App\Models\Division;
use App\Models\Department;
use App\Enums\UserTypeEnum;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use App\Models\RequestDetail;
use App\Models\ProcurementMode;
use App\Models\PurchaseRequest;
use App\Http\Requests\StorePurchaseRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class PurchaseRequestController extends Controller
{
    public function index()
    {
        $inventories = Item::with('itemType')->get();
        $categories = Category::paginate();
        $headstaff = User::role(UserTypeEnum::HeadStaff)->with('roles')->first();
        $proc_modes = ProcurementMode::paginate();
        $user = auth()->user();
        $department = $user->department()->with('divisions.sections')->first();
        $unitType = ItemType::all();
        $divisions = $department->divisions;
        foreach($divisions as $division) {
            $section = $division->sections;
        }

        $departments = Department::where('department_code', null)->get();

        $year = date('Y');
        $date = "PR--{$year}--XXXX";
        return view('purchase-req.create', compact('inventories', 'department', 'unitType', 'divisions', 'proc_modes', 'headstaff', 'date', 'categories', 'departments'));
    }

    public function store(StorePurchaseRequest $request)
    {
        $year = date('Y');
        $createdDetail = RequestDetail::create($request->except('quantity', 'pr_no') + [
            'user_id' => auth()->user()->id,
        ]);
        $formated_count = sprintf("%04d", $createdDetail->id);
        $createdDetail->pr_no = "PR-{$year}-{$formated_count}";
        $createdDetail->save();

        $purchaseItems = collect($request->items)->map(fn(array $purchaseItem) => ['item_id' => $purchaseItem['item_id'], 'quantity' => $purchaseItem['quantity'], 'estimated_cost' => $purchaseItem['estimated_cost'], 'unit_price' => $purchaseItem['unit_price'], 'request_detail_id' => $createdDetail->id])->toArray();

        PurchaseRequest::insert($purchaseItems);

        return redirect()->route('purchase-request.show', auth()->id());
    }

    public function show()
    {
        $requests = RequestDetail::with(['procurementMode', 'department', 'division', 'user', 'approvedByUser', 'biddingAbstract', 'purchaseRequest.item.itemType'])->orderBy('created_at', 'desc')->where('status', '!=', 13)->get();

        return view('purchase-req.index', compact('requests'));
    }

    public function edit($id)
    {
        $requestDetail = RequestDetail::with('procurementMode', 'user', 'user.department', 'division', 'department', 'purchaseRequest', 'purchaseRequest.item.itemType')->find($id);

        $user = User::find($requestDetail->user_id);
        $department = $user->department()->with('divisions.sections')->first();
        $departments = Department::paginate();
        $categories = Category::all();
        $inventories = Item::with('itemType')->paginate();
        $procurementModes = ProcurementMode::all();
        $divisions = $department->divisions;
        foreach($divisions as $division) {
            $section = $division->sections;
        }

        return view('purchase-req.edit', compact('requestDetail', 'inventories', 'procurementModes', 'id', 'departments', 'categories', 'divisions'));
    }

    public function preview($id)
    {
        $request_detail = RequestDetail::with('procurementMode', 'user', 'purchaseRequest', 'department', 'department.divisions', 'purchaseRequest.item.itemType')->find($id);

        $inventories = Item::paginate();
        $departments = Department::paginate();

        $procurementModes = ProcurementMode::all();

        return view('purchase-req.view', compact('request_detail', 'inventories', 'procurementModes', 'id', 'departments'));
    }

    public function update(StorePurchaseRequest $request, $id)
    {
        dd($request->validated());

        $request_detail = RequestDetail::find($id);
        $request_detail->update($request->except('items', '_token', 'example_length') + ['user_id' => auth()->user()->id]);

        foreach ($request->items as $item) {
            if ($purchaseRequest = PurchaseRequest::where('item_id', $item['item_id'])->where('request_detail_id', $request_detail->id)->first()) {
                $purchaseRequest->update(['quantity' => $item['quantity'], 'estimated_cost' => $item['estimated_cost']]);
            } else {
                PurchaseRequest::create(['item_id' => $item['item_id'], 'quantity' => $item['quantity'], 'estimated_cost' => $item['estimated_cost'], 'unit_price' => $item['unit_price'], 'request_detail_id' => $request_detail->id]);
            }
        }

        return redirect()->route('purchase-request.show', auth()->id());
    }

    public function approve($id, $uid)
    {
        $requestDetail = RequestDetail::find($id);
        if (auth()->user()->roles->first()->name === 'staff') {
            $requestDetail->update(['status' => 5, 'approved_by' => $uid]);
        } elseif (auth()->user()->roles->first()->name === 'headstaff') {
            $requestDetail->update(['status' => 4, 'approved_by' => $uid]);
        }

        return redirect()->back();
    }

    public function removePr($id)
    {
        $pr_id = RequestDetail::find($id);
        $pr_id->delete($id);

        return redirect()->back();
    }

    public function removeItem($id, $grand)
    {
        $requestDetail = RequestDetail::find($grand);
        $purchaseItem = PurchaseRequest::find($id);
        $requestDetail->grand_total -= $purchaseItem->estimated_cost;
        $requestDetail->save();

        $purchaseItem->delete();

        return redirect()->back();
    }

    public function complete($id) {

        $pr = RequestDetail::find($id);
        $pr->status = 13;
        $pr->save();

        return redirect()->back();
    }

    public function pr($id) {
        $request = RequestDetail::with('purchaseRequest.item.itemType')->find($id);
        $arr = array();
        foreach ($request->purchaseRequest as $prequest) {
            $pr = [
                'id' => $prequest->id,
                'item_id' => $prequest->item->id,
            ];
            array_push($arr, $pr);
        }
        return response()->json(array("data" => $arr));
    }

    public function completedPr() {

        $requests = RequestDetail::with('department', 'division', 'section')->where('status', 13)->get();

        return view('purchase-req.complete', compact('requests'));
    }

}
