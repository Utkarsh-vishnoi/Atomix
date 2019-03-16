<?php

namespace Atomix\Http\Controllers;

use Auth;
use Atomix\Atom;

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

    public function home()
    {
        $atoms = Atom::exclude(['skel', 'style', 'func', 'updated_at'])->with('User')->paginate(9);
        return view('home', ['atoms' => $atoms]);
    }
}
