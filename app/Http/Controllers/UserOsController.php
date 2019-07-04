<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailableOS;

class UserOsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-requestos')) return $next($request);
            abort(403, "You don't have that privileges");
        });
        
    }

    public function index()
    {
        $useros = \App\UserOs::all();
        return view('useros.index', ['useros' => $useros]);
    }

    public function create()
    {
        $ipaddress = \App\IpAddress::all();
        $data = array(
            'ipaddress' => $ipaddress
        );
        return view("useros.create",$data);
    }

    public function store(Request $request)
    {
        $useros = new \App\UserOs;
        $useros->requester_name = \Auth::user()->name;
        $useros->project_name = $request->get('project_name');
        $useros->source = $request->get('source');
        $useros->username = $request->get('username');
        $useros->roles = $request->get('roles');
        $useros->description = $request->get('description');
        $useros->step = 0;

        $useros->save();
        $useros->id = $useros->id;
        Mail::to('ankyaditya17@gmail.com')->send(new SendMailableOS($useros));
        return redirect()->route('useros.index')->with('status', 'Request Firewall Added');
    }

    public function show($id)
    {
        $useros = \App\UserOs::findOrFail($id);
        return view('useros.show', ['useros' => $useros]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function approvemgr($id){
        $current_date_time = Carbon::now();
        $useros = \App\UserOs::findOrFail($id);
        $useros->status_approval = 'Approved';
        $useros->approved_by = \Auth::user()->name;
        $useros->approved_date = $current_date_time;
        $useros->step = 1;
        $useros->save();

        return redirect()->route('useros.index', ['id' => $id])->with('status','Request Approved');
    }

    public function disapprovemgr($id){
        $current_date_time = Carbon::now();
        $useros = \App\UserOs::findOrFail($id);
        $useros->status_approval = 'Disapprove';
        $useros->approved_by = \Auth::user()->name;
        $useros->approved_date = $current_date_time;
        $useros->step = 0;
        $useros->save();

        return redirect()->route('useros.index', ['id' => $id])->with('status','Request Disaprove');
    }

    public function approvestaffw($id){
        $current_date_time = Carbon::now();
        $useros = \App\UserOs::findOrFail($id);
        $useros->status_worked = 'Approved';
        $useros->worked_by = \Auth::user()->name;
        $useros->worked_date = $current_date_time;
        $useros->step = 2;
        $useros->save();

        return redirect()->route('useros.index', ['id' => $id])->with('status','Request Approved');
    }

    public function approvestaffc($id){
        $current_date_time = Carbon::now();
        $useros = \App\UserOs::findOrFail($id);
        $useros->status_checked = 'Approved';
        $useros->checked_by = \Auth::user()->name;
        $useros->checked_date = $current_date_time;
        $useros->step = 3;
        $useros->save();
        return redirect()->route('useros.index', ['id' => $id])->with('status','Request Approved');
    }
}
