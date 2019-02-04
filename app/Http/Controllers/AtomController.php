<?php

namespace Atomix\Http\Controllers;

use Auth;
use Atomix\Atom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AtomController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new()
    {
        return view('editor');
    }

    public function preview($id)
    {
    	$atom = Atom::find($id);
    	dd($atom);
    }
}
