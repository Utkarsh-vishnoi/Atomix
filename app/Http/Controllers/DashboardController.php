<?php

namespace Atomix\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/');
    }

    public function getFrames()
    {
   		$atoms = Auth::user()->atoms()->exclude(['skel', 'style', 'func', 'updated_at'])->get();
   		return response()->json($atoms);
    }
}
