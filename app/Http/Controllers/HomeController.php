<?php

namespace App\Http\Controllers;

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
        $allfw = \App\AccessFirewall::all()->count();
        $pendingfw = \App\AccessFirewall::where('step','0')->orWhere('step','1')->orWhere('step','2')->count();
        $approvedfw = \App\AccessFirewall::where('step','3')->count();

        $allrs = \App\Server::all()->count();
        $pendingrs = \App\Server::where('step','0')->orWhere('step','1')->orWhere('step','2')->count();
        $approvedrs = \App\Server::where('step','3')->count();

        $allos = \App\UserOs::all()->count();
        $pendingos = \App\UserOs::where('step','0')->orWhere('step','1')->orWhere('step','2')->count();
        $approvedos = \App\UserOs::where('step','3')->count();

        $data = array(
            'allfw' => $allfw,
            'pendingfw' => $pendingfw,
            'approvedfw' => $approvedfw,
            'allrs' => $allrs,
            'pendingrs' => $pendingrs,
            'approvedrs' => $approvedrs,
            'allos' => $allos,
            'pendingos' => $pendingos,
            'approvedos' => $approvedos
        );

        return view('home',$data);
    }
}
