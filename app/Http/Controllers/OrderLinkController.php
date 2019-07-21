<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailableOL;
use App\Mail\SendMailbackOL;
use App\Exports\OrderLinkExport;
use Excel;

class OrderLinkController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-orderlink')) return $next($request);
            abort(403, "You don't have that privileges");
        });
        
    }

    public function index(Request $request)
    {
        $orderlink = \App\OrderLink::all();

        $from = $request->get('from');
        $to = $request->get('to');
        if ($from && $to) {
            $orderlink = \App\OrderLink::whereBetween('request_date', [$from, $to])->get();
        }
        
        return view('orderlink.index', ['orderlink' => $orderlink]);

    }

    public function create()
    {
        return view("orderlink.create");
    }

    public function store(Request $request)
    {
        $orderlink = new \App\OrderLink;
        $current_date_time = Carbon::now();
        $orderlink->requester_name = \Auth::user()->name;
        $orderlink->requester_email = \Auth::user()->email;
        $orderlink->namaperusahaan = $request->get('namaperusahaan');
        $orderlink->address = $request->get('address');
        $orderlink->notelpon = $request->get('notelpon');
        $orderlink->namapic = $request->get('namapic');
        $orderlink->nopic = $request->get('nopic');
        $orderlink->emailpic = $request->get('emailpic');
        $orderlink->providerlink = $request->get('providerlink');
        $orderlink->jenislink = $request->get('jenislink');
        $orderlink->backhaul = $request->get('backhaul');
        $orderlink->bandwidthlink = $request->get('bandwidthlink');
        $orderlink->ikg = $request->get('ikg');
        $orderlink->targetdate = $request->get('targetdate');
        $orderlink->request_date = $current_date_time;
        $orderlink->step = 0;

        $orderlink->save();
        $orderlink->id = $orderlink->id;
        Mail::to('ankyaditya17@gmail.com')->send(new SendMailableOL($orderlink));
        return redirect()->route('orderlink.index')->with('status', 'Order Link Added');
    }

    public function show($id)
    {
        $orderlink = \App\OrderLink::findOrFail($id);
        return view('orderlink.show', ['orderlink' => $orderlink]);
    }
    
    public function edit($id)
    {
        $orderlink = \App\OrderLink::findOrFail($id);
        return view('orderlink.edit', ['orderlink' => $orderlink]);
    }
    
    public function update(Request $request, $id)
    {
        $orderlink = \App\OrderLink::findOrFail($id);
        $orderlink->namaperusahaan = $request->get('namaperusahaan');
        $orderlink->address = $request->get('address');
        $orderlink->notelpon = $request->get('notelpon');
        $orderlink->namapic = $request->get('namapic');
        $orderlink->nopic = $request->get('nopic');
        $orderlink->emailpic = $request->get('emailpic');
        $orderlink->providerlink = $request->get('providerlink');
        $orderlink->jenislink = $request->get('jenislink');
        $orderlink->backhaul = $request->get('backhaul');
        $orderlink->bandwidthlink = $request->get('bandwidthlink');
        $orderlink->ikg = $request->get('ikg');
        if (empty($request->get('targetdate'))) { } else {
            $orderlink->targetdate = $request->get('targetdate');
        }

        $orderlink->save();
        return redirect()->route('orderlink.edit', ['id' => $id])->with('status','Request succesfully updated');
    }
    
    public function destroy($id)
    {
        //
    }

    public function approvemgr(Request $request, $id){
        $current_date_time = Carbon::now();
        $orderlink = \App\OrderLink::findOrFail($id);
        $orderlink->status_approval = 'Approved';
        $orderlink->approved_by = \Auth::user()->name;
        $orderlink->approved_date = $current_date_time;
        $orderlink->step = 1;
        $orderlink->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);

        return redirect()->route('orderlink.index', ['id' => $id])->with('status','Request Approved');
    }

    public function disapprovemgr(Request $request, $id){
        $current_date_time = Carbon::now();
        $orderlink = \App\OrderLink::findOrFail($id);
        $orderlink->status_approval = 'Disapprove';
        $orderlink->approved_by = \Auth::user()->name;
        $orderlink->approved_date = $current_date_time;
        $orderlink->step = -1;
        $orderlink->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);

        return redirect()->route('orderlink.index', ['id' => $id])->with('status','Request Disaprove');
    }

    public function approvestaffw(Request $request, $id){
        $current_date_time = Carbon::now();
        $orderlink = \App\OrderLink::findOrFail($id);
        $orderlink->status_worked = 'Approved';
        $orderlink->worked_by = \Auth::user()->name;
        $orderlink->worked_date = $current_date_time;
        $orderlink->step = 2;
        $orderlink->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);

        return redirect()->route('orderlink.index', ['id' => $id])->with('status','Request Approved');
    }

    public function approvestaffc(Request $request, $id){
        $current_date_time = Carbon::now();
        $orderlink = \App\OrderLink::findOrFail($id);
        $orderlink->status_checked = 'Approved';
        $orderlink->checked_by = \Auth::user()->name;
        $orderlink->checked_date = $current_date_time;
        $orderlink->step = 3;
        $orderlink->save();
        $data = array(
            'id_request' => $request->get('id_request'),
            'unique_request' => $request->get('unique_request'),
            'role' => $request->get('role')
        );
        $this->timeline($data);
        $orderlink->id = $orderlink->id;
        $orderlink->requestner_name = $orderlink->requestner_name;
        Mail::to('ankyaditya17@gmail.com')->send(new SendMailbackOL($orderlink));
        return redirect()->route('orderlink.index', ['id' => $id])->with('status','Request Approved');
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
        $timeline->description = 'Order Link';
        $timeline->date = $current_date_time;
        $timeline->save();
    }

    public function export()
    {
        return Excel::download(new OrderLinkExport, 'Order_link_finnet.xlsx');
    }
}
