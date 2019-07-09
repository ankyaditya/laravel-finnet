@extends('layouts.global')
@section("title") List Request @endsection
@section("subtitle") User OS @endsection
@section("content")
<div class="card">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="card-header">
        <h3 class="card-title">Data Request</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if(Auth::user()->roles == "USER")
            <a href="{{route('useros.create')}}" style="padding:13px;" class="btn btn-app">
                <i class="fa fa-edit"></i> Tambah
            </a>
        @else
        <a href="" style="padding:13px;" class="btn btn-app disabled">
                <i class="fa fa-edit"></i> Tambah
            </a>
        @endif
        <!-- <a href="/firewallaccess/exporti" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> -->

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Request</th>
                    <th>Requester Name</th>
                    <th>Username</th>
                    <th>Source</th>
                    <th>Role</th>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Request Date</th>
                    <th>Worked Date</th>
                    <th>Checked by</th>
                    <th>Status Cheked</th>
                    <th>Approved by</th>
                    <th>Status Approval</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($useros as $uos)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>OS{{$uos->id}}</td>
                    <td>{{$uos->requester_name}}</td>
                    <td>
                        {{$uos->username}}
                    </td>
                    <td>
                        {{$uos->source}}
                    </td>
                    <td>
                        {{$uos->roles}}
                    </td>
                    <td>
                        {{$uos->project_name}}
                    </td>
                    <td>
                        {{$uos->description}}
                    </td>
                    <td>
                        {{$uos->request_date}}
                    </td>
                    <td>
                        @if($uos->worked_date == NULL)
                        <span class="badge badge-info">
                            Waiting
                        </span>
                        @else
                            {{$uos->worked_date}}
                        @endif
                    </td>
                    <td>
                        @if($uos->checked_by == NULL)
                        <span class="badge badge-info">
                            Waiting
                        </span>
                        @else
                            {{$uos->checked_by}}
                        @endif
                    </td>
                    <td>
                        @if($uos->status_checked == "Pending")
                            <span class="badge badge-warning">
                                {{$uos->status_checked}}
                            </span>
                        @else
                            <span class="badge badge-success">
                                {{$uos->status_checked}}
                            </span>
                        @endif
                    </td>
                    <td>
                        @if($uos->approved_by == NULL)
                        <span class="badge badge-info">
                            Waiting
                        </span>
                        @else
                            {{$uos->approved_by}}
                        @endif
                    </td>
                    <td>
                    @if($uos->status_approval == "Approved")
                        <span class="badge badge-success">
                            {{$uos->status_approval}}
                        </span>
                        @elseif($uos->status_approval == "Pending")
                        <span class="badge badge-warning">
                            {{$uos->status_approval}}
                        </span>
                        @else
                        <span class="badge badge-danger">
                            {{$uos->status_approval}}
                        </span>
                        @endif
                    </td>
                    <td>
                        @if(Auth::user()->roles == "USER")
                            <?php $step = 4; ?>
                        @else
                            <?php $step = 1; ?>
                        @endif
                        

                        @if(Auth::user()->roles == "ADMIN" && $uos->status_approval == "Pending")
                            <form action="{{route('useros.approvemgr', ['id'=>$uos->id])}}" method="POST">
                                @csrf
                                <input type="hidden" value="PUT" name="_method">
                                <input type="submit" class="btn btn-success btn-sm" value="Approve">
                            </form>
                            <form action="{{route('useros.disapprovemgr', ['id'=>$uos->id])}}" method="POST">
                                @csrf
                                <input type="hidden" value="PUT" name="_method">
                                <input type="submit" class="btn btn-danger btn-sm" value="Disapprove">
                            </form>
                        @elseif(Auth::user()->roles == "STAFF" && $uos->step == 1)
                            <form class="d-inline" action="{{route('useros.approvestaffw', ['id'=>$uos->id])}}" method="POST" onsubmit="return confirm('Approve This Request?')">
                                @csrf
                                <input type="hidden" value="PUT" name="_method">
                                <input type="submit" class="btn btn-success btn-sm" value="Approve">
                            </form>
                        @elseif(Auth::user()->roles == "STAFF" && $uos->step == 2)
                            <form class="d-inline" action="{{route('useros.approvestaffc', ['id'=>$uos->id])}}" method="POST" onsubmit="return confirm('Approve This Request?')">
                                @csrf
                                <input type="hidden" value="PUT" name="_method">
                                <input type="submit" class="btn btn-success btn-sm" value="Approve">
                            </form>
                        @elseif($uos->step == 3 && $step != 4 || Auth::user()->roles == "ADMIN" || Auth::user()->roles == "STAFF")
                            <a class="btn btn-success btn-sm disabled">Done</a>        
                        @endif
                        @if(Auth::user()->roles == "USER" && Auth::user()->name == $uos->requester_name && $uos->step == 0)
                            <a class="btn btn-info text-white btn-sm" href="{{route('useros.edit', ['id'=>$uos->id])}}">Edit</a>
                        @endif
                        <a class="btn btn-info text-white btn-sm" href="{{route('useros.show', ['id'=>$uos->id])}}">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection