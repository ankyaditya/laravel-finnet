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
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Request</th>
                    <th>Requester Name</th>
                    <th>Name for Access</th>
                    <th>Firewall Address</th>
                    <th>Role</th>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Request Date</th>
                    <th>Worked Date</th>
                    <th>Cheked by</th>
                    <th>Status Cheked</th>
                    <th>Approved by</th>
                    <th>Status Approval</th>
                    <th>Action</th>
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
                        @if($firewall->worked_date == NULL)
                        <span class="badge badge-info">
                            Waiting
                        </span>
                        @else
                        {{$firewall->worked_date}}
                        @endif
                    </td>
                    <td>
                        @if($firewall->checked_by == NULL)
                        <span class="badge badge-info">
                            Waiting
                        </span>
                        @else
                        {{$firewall->checked_by}}
                        @endif
                    </td>
                    <td>
                        @if($firewall->status_checked == "Approved")
                        <span class="badge badge-success">
                            {{$firewall->status_checked}}
                        </span>
                        @else
                        <span class="badge badge-warning">
                            {{$firewall->status_checked}}
                        </span>
                        @endif
                    </td>
                    <td>
                        @if($firewall->approved_by == NULL)
                        <span class="badge badge-info">
                            Waiting
                        </span>
                        @else
                        {{$firewall->approved_by}}
                        @endif
                    </td>
                    <td>
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
                    </td>
                    <td>
                        @if(Auth::user()->roles == "ADMIN" && $firewall->status_approval == "Pending")
                        <form class="d-inline" action="{{route('firewalls.approvemgr', ['id'=>$firewall->id])}}" method="POST" onsubmit="return confirm('Approve This User?')">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">
                            <input type="submit" class="btn btn-success btn-sm" value="Approve">
                        </form>
                        @elseif(Auth::user()->roles == "STAFF" && $firewall->step == 1)
                        <form class="d-inline" action="{{route('firewalls.approvestaff', ['id'=>$firewall->id])}}" method="POST" onsubmit="return confirm('Approve This User?')">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">
                            <input type="submit" class="btn btn-success btn-sm" value="Approve">
                        </form>
                        @else(Auth::user()->roles == "USER" && $firewall->step == 2)
                        <a class="btn btn-success btn-sm disabled">Done</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection