<?php

namespace App\Http\Controllers;

use App\Http\Requests\BacResRequest;
use App\Models\BacRes;
use App\Models\RequestDetail;
use Illuminate\Http\Request;

class BacController extends Controller
{
    public function create($id)
    {

        $request = RequestDetail::find($id);
        $bac = BacRes::max('id');


        if (is_null($bac)) {
            $bac = 0;
        } else {
            $bac++;
        }

        $formated_count = sprintf("%04d", $bac);
        $year = date('Y');
        $cFormat = "R-{$year}-XXXX";

        return view('reports.bac.bac', compact('request', 'cFormat', 'id'));
    }

    public function store(BacResRequest $request, $id)
    {
        $year = date('Y');

        $res = BacRes::create($request->except('c_number') + ['request_detail_id' => $id]);
        $formated_count = sprintf("%04d", $res->id);
        $res->c_number = "R-{$year}-{$formated_count}";
        $res->save();



        $bac = RequestDetail::find($id);
        $bac->status = 6;
        $bac->save();

        return redirect()->route('bac.index');
    }

    public function index()
    {
        $res = BacRes::with('requestDetail', 'requestDetail.department')->get();

        return view('reports.bac.index', compact('res'));
    }

    public function edit($id) {
        $abstract = BacRes::with('requestDetail', 'requestDetail.department')->find($id);

        return view('reports.bac.update', compact('abstract', 'id'));
    }

    public function update(Request $request, $id) {
        $bac = BacRes::find($id);
        $bac->update($request->all());

        return redirect()->route('bac.index');
    }

    public function delete($id, $rid) {

        BacRes::find($id)->delete($id);

        RequestDetail::find($rid)->update(['status' => 5]);

        return redirect()->back();
    }

}
