<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailableFW;
use App\Mail\SendMailbackFW;
use App\Exports\AccessExport;
use Excel;

class AccessFirewallController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-requestfirewall')) return $next($request);
            abort(403, "You don't have that privileges");
        });
    }

    public function index(Request $request)
    {
        $firewallaccesss = \App\AccessFirewall::all();

        $from = $request->get('from');
        $to = $request->get('to');
        if ($from && $to) {
            $firewallaccesss = \App\AccessFirewall::whereBetween('request_date', [$from, $to])->get();
        }

        return view('firewallaccess.index', ['firewallaccesss' => $firewallaccesss]);
    }

    public function create()
    {
        $ipaddress = \App\IpAddress::all();
        $data = array(
            'ipaddress' => $ipaddress
        );
        return view("firewallaccess.create", $data);
    }

    public function store(Request $request)
    {
        $firewallaccesss = new \App\AccessFirewall;
        $current_date_time = Carbon::now();
        $firewallaccesss->requester_name = \Auth::user()->name;
        $firewallaccesss->requester_email = \Auth::user()->email;
        $firewallaccesss->project_name = $request->get('project_name');
        $firewallaccesss->source = $request->get('source');
        $firewallaccesss->destination = $request->get('destination');
        $firewallaccesss->port = $request->get('port');
        $firewallaccesss->access_period = $request->get('access_period');
        $firewallaccesss->description = $request->get('description');
        $firewallaccesss->request_date = $current_date_time;
        $firewallaccesss->step = 0;
        $firewallaccesss->save();
        $firewallaccesss->id = $firewallaccesss->id;
        Mail::to('ankyaditya17@gmail.com')->send(new SendMailableFW($firewallaccesss));
        return redirect()->route('firewallaccess.index')->with('status', 'Request Firewall Added');
    }

    public function show($id)
    {
        $firewallaccesss = \App\AccessFirewall::findOrFail($id);
        return view('firewallaccess.show', ['firewallaccesss' => $firewallaccesss]);
    }

    public function edit($id)
    {
        $firewallaccesss = \App\AccessFirewall::findOrFail($id);
        $ipaddress = \App\IpAddress::all();
        $data = array(
            'ipaddress' => $ipaddress,
            'firewallaccesss' => $firewallaccesss,
        );
        return view('firewallaccess.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $firewallaccesss = \App\AccessFirewall::findOrFail($id);
        $firewallaccesss->source = $request->get('source');
        $firewallaccesss->destination = $request->get('destination');
        $firewallaccesss->port = $request->get('port');
        $firewallaccesss->project_name = $request->get('project_name');
        $firewallaccesss->description = $request->get('description');

        $firewallaccesss->save();
        return redirect()->route('firewallaccess.edit', ['id' => $id])->with('status', 'Request succesfully updated');
    }

    public function destroy($id)
    { 
        //
    }

    public function approvemgr(Request $request, $id)
    {
        $current_date_time = Carbon::now();
        $firewallaccesss = \App\AccessFirewall::findOrFail($id);
        $firewallaccesss->status_approval = 'Approved';
        $firewallaccesss->approved_by = \Auth::user()->name;
        $firewallaccesss->approved_date = $current_date_time;
        $firewallaccesss->step = 1;
        $firewallaccesss->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);

        return redirect()->route('firewallaccess.index', ['id' => $id])->with('status', 'Request Approved');
    }

    public function disapprovemgr(Request $request, $id)
    {
        $current_date_time = Carbon::now();
        $firewallaccesss = \App\AccessFirewall::findOrFail($id);
        $firewallaccesss->status_approval = 'Disapprove';
        $firewallaccesss->approved_by = \Auth::user()->name;
        $firewallaccesss->approved_date = $current_date_time;
        $firewallaccesss->step = -1;
        $firewallaccesss->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);

        return redirect()->route('firewallaccess.index', ['id' => $id])->with('status', 'Request Disaprove');
    }

    public function approvestaffw(Request $request, $id)
    {
        $current_date_time = Carbon::now();
        $firewallaccesss = \App\AccessFirewall::findOrFail($id);
        $firewallaccesss->status_worked = 'Approved';
        $firewallaccesss->worked_by = \Auth::user()->name;
        $firewallaccesss->worked_date = $current_date_time;
        $firewallaccesss->step = 2;
        $firewallaccesss->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);

        return redirect()->route('firewallaccess.index', ['id' => $id])->with('status', 'Request Approved');
    }

    public function approvestaffc(Request $request, $id)
    {
        $current_date_time = Carbon::now();
        $firewallaccesss = \App\AccessFirewall::findOrFail($id);
        $firewallaccesss->status_checked = 'Approved';
        $firewallaccesss->checked_by = \Auth::user()->name;
        $firewallaccesss->checked_date = $current_date_time;
        $firewallaccesss->step = 3;
        $firewallaccesss->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);
        $firewallaccesss->id = $firewallaccesss->id;
        $firewallaccesss->requestner_name = $firewallaccesss->requestner_name;
        Mail::to('ankyaditya17@gmail.com')->send(new SendMailbackFW($firewallaccesss));
        return redirect()->route('firewallaccess.index', ['id' => $id])->with('status', 'Request Approved');
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
        $timeline->description = 'Request Firewall';
        $timeline->date = $current_date_time;
        $timeline->save();
    }

    public function export()
    {
        return Excel::download(new AccessExport, 'Access_firewal_finnet.xlsx');
    }
}
