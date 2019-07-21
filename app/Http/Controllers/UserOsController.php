<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailableOS;
use App\Mail\SendMailbackOS;
use App\Exports\UserOsExport;
use Excel;

class UserOsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-requestos')) return $next($request);
            abort(403, "You don't have that privileges");
        });
        
    }

    public function index(Request $request)
    {
        $useros = \App\UserOs::all();

        $from = $request->get('from');
        $to = $request->get('to');
        if ($from && $to) {
            $useros = \App\UserOs::whereBetween('request_date', [$from, $to])->get();
        }
        
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
        $current_date_time = Carbon::now();
        $useros->requester_name = \Auth::user()->name;
        $useros->requester_email = \Auth::user()->email;
        $useros->project_name = $request->get('project_name');
        $useros->source = $request->get('source');
        $useros->username = $request->get('username');
        $useros->roles = $request->get('roles');
        $useros->description = $request->get('description');
        $useros->request_date = $current_date_time;
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
        $useros = \App\UserOs::findOrFail($id);
        $ipaddress = \App\IpAddress::all();
        $data = array(
            'ipaddress' => $ipaddress,
            'useros' => $useros,
        );
        return view('useros.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $useros = \App\UserOs::findOrFail($id);
        $useros->project_name = $request->get('project_name');
        $useros->source = $request->get('source');
        $useros->username = $request->get('username');
        $useros->roles = $request->get('roles');
        $useros->description = $request->get('description');

        $useros->save();
        return redirect()->route('useros.edit', ['id' => $id])->with('status','Request succesfully updated');
    }

    public function destroy($id)
    {
        //
    }

    public function approvemgr(Request $request, $id){
        $current_date_time = Carbon::now();
        $useros = \App\UserOs::findOrFail($id);
        $useros->status_approval = 'Approved';
        $useros->approved_by = \Auth::user()->name;
        $useros->approved_date = $current_date_time;
        $useros->step = 1;
        $useros->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);

        return redirect()->route('useros.index', ['id' => $id])->with('status','Request Approved');
    }

    public function disapprovemgr(Request $request, $id){
        $current_date_time = Carbon::now();
        $useros = \App\UserOs::findOrFail($id);
        $useros->status_approval = 'Disapprove';
        $useros->approved_by = \Auth::user()->name;
        $useros->approved_date = $current_date_time;
        $useros->step = -1;
        $useros->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);

        return redirect()->route('useros.index', ['id' => $id])->with('status','Request Disaprove');
    }

    public function approvestaffw(Request $request, $id){
        $current_date_time = Carbon::now();
        $useros = \App\UserOs::findOrFail($id);
        $useros->status_worked = 'Approved';
        $useros->worked_by = \Auth::user()->name;
        $useros->worked_date = $current_date_time;
        $useros->step = 2;
        $useros->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);

        return redirect()->route('useros.index', ['id' => $id])->with('status','Request Approved');
    }

    public function approvestaffc(Request $request, $id){
        $current_date_time = Carbon::now();
        $useros = \App\UserOs::findOrFail($id);
        $useros->status_checked = 'Approved';
        $useros->checked_by = \Auth::user()->name;
        $useros->checked_date = $current_date_time;
        $useros->step = 3;
        $useros->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);
        $useros->id = $useros->id;
        $useros->requestner_name = $useros->requestner_name;
        Mail::to('ankyaditya17@gmail.com')->send(new SendMailbackOS($useros));
        return redirect()->route('useros.index', ['id' => $id])->with('status','Request Approved');
    }

    public function timeline($data)
    {
        $timeline = new \App\Timeline();
        $current_date_time = Carbon::now();
        $timeline->id_request = $data['id_request'];
        $timeline->id_user = \Auth::user()->id;
        $timeline->unique_request = $data['unique_request'];
        $timeline->name = \Auth::user()->name;
        $timeline->role = $data['role'];
        $timeline->description = 'Request User OS';
        $timeline->date = $current_date_time;
        $timeline->save();
    }

    public function export()
    {
        return Excel::download(new UserOsExport, 'User_Os_finnet.xlsx');
    }
}
