<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class UserFirewallController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-userfirewall')) return $next($request);
            abort(403, "You don't have that privileges");
        });
    }

    public function index()
    {
        $firewalls = \App\UserFirewall::all();
        return view('firewalls.index', ['firewalls' => $firewalls]);
    }

    public function create()
    {
        return view("firewalls.create");
    }

    public function store(Request $request)
    {
        $userfirewalls = new \App\UserFirewall;
        $userfirewalls->requester_name = $request->get('requester_name');
        $userfirewalls->project_name = $request->get('project_name');
        $userfirewalls->name_for_access = $request->get('name_request');
        $userfirewalls->firewall_address = $request->get('firewall_address');
        $userfirewalls->role = $request->get('roles');
        $userfirewalls->description = $request->get('description');
        $userfirewalls->step = 0;

        $userfirewalls->save();
        return redirect()->route('firewalls.index')->with('status', 'Request User Added');
    }

    public function show($id)
    {
        //
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
        $userfirewalls = \App\UserFirewall::findOrFail($id);
        $userfirewalls->delete();
        return redirect()->route('firewalls.index')->with('status', 'Request successfully delete');
    }

    public function approvemgr($id)
    {
        $userfirewalls = \App\UserFirewall::findOrFail($id);
        $userfirewalls->status_approval = 'Approved';
        $userfirewalls->approved_by = \Auth::user()->name;
        $userfirewalls->step = 1;
        $userfirewalls->save();
        return redirect()->route('firewalls.index', ['id' => $id])->with('status', 'Request Approved');
        //return redirect()->route('firewalls.index')->with('status', 'Request Approved');
    }

    public function approvestaff($id)
    {
        $current_date_time = Carbon::now();
        $userfirewalls = \App\UserFirewall::findOrFail($id);
        $userfirewalls->status_checked = 'Approved';
        $userfirewalls->checked_by = \Auth::user()->name;
        $userfirewalls->worked_date = $current_date_time;
        $userfirewalls->step = 2;
        $userfirewalls->save();
        return redirect()->route('firewalls.index', ['id' => $id])->with('status', 'Request Approved');
        //return redirect()->route('firewalls.index')->with('status', 'Request Approved');
    }
}
