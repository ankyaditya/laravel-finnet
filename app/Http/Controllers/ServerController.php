<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailableRS;
use App\Mail\SendMailbackRS;

class ServerController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-requestserver')) return $next($request);
            abort(403, "You don't have that privileges");
        });
        
    }

    public function index()
    {
        $server = \App\Server::all();
        return view('server.index', ['server' => $server]);
    }

    public function create()
    {
        return view("server.create");
    }

    public function store(Request $request)
    {
        $server = new \App\Server;
        $server->requester_name = \Auth::user()->name;
        $server->os = $request->get('os');
        $server->ram = $request->get('ram');
        $server->cpu = $request->get('cpu');
        $server->disk = $request->get('disk');
        $server->environtment = $request->get('environtment');
        $server->aplikasi = $request->get('aplikasi');
        $server->file = $request->get('file');
        $server->description = $request->get('description');
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
        $server = \App\Server::findOrFail($id);
        $server->status_approval = 'Approved';
        $server->approved_by = \Auth::user()->name;
        $server->approved_date = $current_date_time;
        $server->step = 1;
        $server->save();

        return redirect()->route('server.index', ['id' => $id])->with('status','Request Approved');
    }

    public function disapprovemgr($id){
        $current_date_time = Carbon::now();
        $server = \App\Server::findOrFail($id);
        $server->status_approval = 'Disapprove';
        $server->approved_by = \Auth::user()->name;
        $server->approved_date = $current_date_time;
        $server->step = 0;
        $server->save();

        return redirect()->route('server.index', ['id' => $id])->with('status','Request Disaprove');
    }

    public function approvestaffw($id){
        $current_date_time = Carbon::now();
        $server = \App\Server::findOrFail($id);
        $server->status_worked = 'Approved';
        $server->worked_by = \Auth::user()->name;
        $server->worked_date = $current_date_time;
        $server->step = 2;
        $server->save();

        return redirect()->route('server.index', ['id' => $id])->with('status','Request Approved');
    }

    public function approvestaffc($id){
        $current_date_time = Carbon::now();
        $server = \App\Server::findOrFail($id);
        $server->status_checked = 'Approved';
        $server->checked_by = \Auth::user()->name;
        $server->checked_date = $current_date_time;
        $server->step = 3;
        $server->save();
        $server->id = $server->id;
        $server->requestner_name = $server->requestner_name;
        Mail::to('ankyaditya17@gmail.com')->send(new SendMailbackRS($server));
        return redirect()->route('server.index', ['id' => $id])->with('status','Request Approved');
    }
}
