<?php

namespace App\Http\Controllers;

use App\Models\RequestDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pr = RequestDetail::where('status', '!=', 14)
            ->where('user_id', auth()->id())
            ->count();

        $pr_complete = RequestDetail::where('status', '==', 14)
            ->where('user_id', auth()->id())
            ->count();

        $requests = RequestDetail::where('status', '!=', 14)->count();
        $requestComplete = RequestDetail::where('status', 14)->count();

        $prs = RequestDetail::with('department', 'division', 'section')->where('status', 14)->where('user_id', auth()->id())->get();
        $prsStaff = RequestDetail::with('department', 'division', 'section')->where('status', 14)->get();

        return view('home', compact('pr', 'pr_complete', 'requests', 'requestComplete', 'prs', 'prsStaff'));
    }
}
