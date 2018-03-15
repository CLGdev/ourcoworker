<?php

namespace App\Http\Controllers;

use App\Call;

class CallController extends Controller
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

    public function index()
    {
        $calls = Call::where('id', 25);
        //$calls = Call::all();
        return view('calls.calls', compact('calls'));

    }
}
