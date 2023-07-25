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
        $pr = RequestDetail::where('status', '!=', 10)
            ->where('user_id', auth()->id())
            ->count();

        $pr_complete = RequestDetail::where('status', '==', 10)
            ->where('user_id', auth()->id())
            ->count();

        $requests = RequestDetail::where('status', '!=', 10)->count();
        $requestComplete = RequestDetail::where('status', 10)->count();

        return view('home', compact('pr', 'pr_complete', 'requests', 'requestComplete'));
    }
}
