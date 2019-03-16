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

    public function like($atomId)
    {
        $atom = Atom::find($atomId);

        if(!Auth::check()) {
            return response()->json(['error' => 'authRequired']);
        }

        if(!$atom) {
            // This creation doesn't exist
            return response()->json(['error' => 'somethingWentWrong']);
        }

        if(Auth::user()->hasLiked($atom)) {
            return response()->json(['error' => 'alreadyLiked']);
        }

        Auth::user()->like($atom);

        return response()->json(['success' => 'gotIt']);
    }

    public function unlike($atomId)
    {
        $atom = Atom::find($atomId);

        if(!Auth::check()) {
            return response()->json(['error' => 'authRequired']);
        }

        if(!$atom) {
            // This creation doesn't exist
            return response()->json(['error' => 'somethingWentWrong']);
        }

        if (Auth::user()->hasLiked($atom))
        {
            Auth::user()->unlike($atom);
        }

        return response()->json(['success' => 'gotIt']);
    }
}
