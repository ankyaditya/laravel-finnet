@extends('layouts.global')
@section("title") List Request @endsection
@section("subtitle") User Firewall @endsection
@section("content")
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Users</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <a href="{{route('firewalls.create')}}" style="padding:13px;" class="btn btn-app">
            <i class="fa fa-edit"></i> Tambah
        </a>
        <table id="example1" class="table table-bordered table-striped table-responsive ">
            <thead>
                <tr>
                    <th style="heigth: 850px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 40px;text-align:center">No</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 100px;text-align:center">Id Request</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle; horizontal-align: middle ">
                        <div style="width: 200px;text-align:center ">Requester Name</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 200px;text-align:center ">Name for Access</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 200px;text-align:center ">Firewall Address</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 50px;text-align:center ">Role</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 150px;text-align:center ">Project Name</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 300px;text-align:center ">Description</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 200px;text-align:center ">Request Date</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 250px;text-align:center ">Worked Date</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 200px;text-align:center ">Cheked by</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 200px;text-align:center ">Status Cheked</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 180px;text-align:center ">Approved by</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 200px;text-align:center ">Status Approval</div>
                    </th>
                    <th style="width: 350px;vertical-align: middle ; horizontal-align: middle">
                        <div style="width: 100px;text-align:center ">Action</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($firewalls as $firewall)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>FR{{$firewall->id}}</td>
                    <td>{{$firewall->requester_name}}</td>
                    <td>{{$firewall->name_for_access}}</td>
                    <td>{{$firewall->firewall_address}}</td>
                    <td>{{$firewall->role}}</td>
                    <td>{{$firewall->project_name}}</td>
                    <td>{{$firewall->description}}</td>
                    <td>{{$firewall->created_at}}</td>
                    <td>
                        <div style="text-align:center">

                            @if($firewall->worked_date == NULL)
                            <span class="badge badge-info">
                                Waiting
                            </span>
                            @else
                            {{$firewall->worked_date}}
                            @endif
                        </div>
                    </td>
                    <td>
                        <div style="text-align:center">
                            @if($firewall->checked_by == NULL)
                            <span class="badge badge-info">
                                Waiting
                            </span>
                            @else
                            {{$firewall->checked_by}}
                            @endif
                        </div>
                    </td>
                    <td>
                        <div style="text-align:center">
                            @if($firewall->status_checked == "Approved")
                            <span class="badge badge-success">
                                {{$firewall->status_checked}}
                            </span>
                            @else
                            <span class="badge badge-warning">
                                {{$firewall->status_checked}}
                            </span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div style="text-align:center">
                            @if($firewall->approved_by == NULL)
                            <span class="badge badge-info">
                                Waiting
                            </span>
                            @else
                            {{$firewall->approved_by}}
                            @endif
                        </div>
                    </td>
                    <td>
                        <div style="text-align:center">
                            @if($firewall->status_approval == "Approved")
                            <span class="badge badge-success">
                                {{$firewall->status_approval}}
                            </span>
                            @elseif($firewall->status_approval == "Pending")
                            <span class="badge badge-warning">
                                {{$firewall->status_approval}}
                            </span>
                            @else
                            <span class="badge badge-danger">
                                {{$firewall->status_approval}}
                            </span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div style="text-align:center">
                            @if(Auth::user()->roles == "ADMIN" && $firewall->status_approval == "Pending")
                            <form class="d-inline" action="{{route('firewalls.approvemgr', ['id'=>$firewall->id])}}" method="POST" onsubmit="return confirm('Approve This User?')">
                                @csrf
                                <div class="tooltop">
                                    <input type="hidden" value="PUT" name="_method">
                                    <button type="submit" class="btn btn-success btn-ius">
                                        <i class="nav-icon fa  fa-check-square-o"></i>
                                    </button>
                                    <span class="tooltiptextteng">Approve</span>
                                </div>
                            </form>
                            @elseif(Auth::user()->roles == "STAFF" && $firewall->step == 1)
                            <form class="d-inline" action="{{route('firewalls.approvestaff', ['id'=>$firewall->id])}}" method="POST" onsubmit="return confirm('Approve This User?')">
                                @csrf
                                <div class="tooltop">

                                    <input type="hidden" value="PUT" name="_method">
                                    <button type="submit" class="btn btn-success btn-ius">
                                        <i class="nav-icon fa  fa-check-square-o"></i>
                                    </button>
                                    <span class="tooltiptextteng">Approve</span>
                                </div>
                            </form>
                            @else(Auth::user()->roles == "USER" && $firewall->step == 2)
                            <a class="btn btn-success btn-ius disabled">
                                <div class="tooltop"><i class="nav-icon fa  fa-check-square-o" style="float:center"></i>
                                    <span class="tooltiptextteng">Done</span>
                                </div>
                            </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection