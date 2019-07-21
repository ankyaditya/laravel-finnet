<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailableRS;
use App\Mail\SendMailbackRS;
use Excel;
use App\Exports\ServerExport;

class ServerController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-requestserver')) return $next($request);
            abort(403, "You don't have that privileges");
        });
        
    }

    public function index(Request $request)
    {
        $server = \App\Server::all();

        $from = $request->get('from');
        $to = $request->get('to');
        if ($from && $to) {
            $server = \App\Server::whereBetween('request_date', [$from, $to])->get();
        }

        return view('server.index', ['server' => $server]);
    }

    public function create()
    {
        return view("server.create");
    }

    public function store(Request $request)
    {
        $server = new \App\Server;
        $current_date_time = Carbon::now();
        $server->requester_name = \Auth::user()->name;
        $server->requester_email = \Auth::user()->email;
        $server->os = $request->get('os');
        $server->ram = $request->get('ram');
        $server->cpu = $request->get('cpu');
        $server->disk = $request->get('disk');
        $server->environtment = $request->get('environtment');
        $server->aplikasi = $request->get('aplikasi');
        $server->file = $request->get('file');
        $server->description = $request->get('description');
        $server->request_date = $current_date_time;
        $server->step = 0;
        if ($request->file('file')) {
            $file = $request->file('file')->store('files', 'public');
            $server->file = $file;
        }

        $server->save();
        $server->id = $server->id;
        Mail::to('ankyaditya17@gmail.com')->send(new SendMailableRS($server));
        return redirect()->route('server.index')->with('status', 'Request Server Added');
    }

    public function show($id)
    {
        $server = \App\Server::findOrFail($id);
        return view('server.show', ['server' => $server]);
    }

    public function edit($id)
    {
        $server = \App\Server::findOrFail($id);
        return view('server.edit', ['server' => $server]);
    }

    public function update(Request $request, $id)
    {
        $server = \App\Server::findOrFail($id);
        $server->os = $request->get('os');
        $server->ram = $request->get('ram');
        $server->cpu = $request->get('cpu');
        $server->disk = $request->get('disk');
        $server->environtment = $request->get('environtment');
        $server->aplikasi = $request->get('aplikasi');
        $server->description = $request->get('description');
        if ($request->file('file')) {
            if ($server->file && file_exists(storage_path('app/public/' . $server->file))) {
                \Storage::delete('public/' . $server->file);
            }
            $file = $request->file('file')->store('files', 'public');
            $server->file = $file;
        }

        $server->save();
        return redirect()->route('server.edit', ['id' => $id])->with('status','Request succesfully updated');
    }

    public function destroy($id)
    {

    }

    public function approvemgr(Request $request, $id){
        $current_date_time = Carbon::now();
        $server = \App\Server::findOrFail($id);
        $server->status_approval = 'Approved';
        $server->approved_by = \Auth::user()->name;
        $server->approved_date = $current_date_time;
        $server->step = 1;
        $server->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);

        return redirect()->route('server.index', ['id' => $id])->with('status','Request Approved');
    }

    public function disapprovemgr(Request $request, $id){
        $current_date_time = Carbon::now();
        $server = \App\Server::findOrFail($id);
        $server->status_approval = 'Disapprove';
        $server->approved_by = \Auth::user()->name;
        $server->approved_date = $current_date_time;
        $server->step = -1;
        $server->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);

        return redirect()->route('server.index', ['id' => $id])->with('status','Request Disaprove');
    }

    public function approvestaffw(Request $request, $id){
        $current_date_time = Carbon::now();
        $server = \App\Server::findOrFail($id);
        $server->status_worked = 'Approved';
        $server->worked_by = \Auth::user()->name;
        $server->worked_date = $current_date_time;
        $server->step = 2;
        $server->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);

        return redirect()->route('server.index', ['id' => $id])->with('status','Request Approved');
    }

    public function approvestaffc(Request $request, $id){
        $current_date_time = Carbon::now();
        $server = \App\Server::findOrFail($id);
        $server->status_checked = 'Approved';
        $server->checked_by = \Auth::user()->name;
        $server->checked_date = $current_date_time;
        $server->step = 3;
        $server->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);
        $server->id = $server->id;
        $server->requestner_name = $server->requestner_name;
        Mail::to('ankyaditya17@gmail.com')->send(new SendMailbackRS($server));
        return redirect()->route('server.index', ['id' => $id])->with('status','Request Approved');
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
        $timeline->description = 'Request Server';
        $timeline->date = $current_date_time;
        $timeline->save();
    }

    public function export()
    {
        return Excel::download(new ServerExport, 'Request_server_finnet.xlsx');
    }
}
