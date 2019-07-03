@extends('layouts.global')
@section("title") List Request @endsection
@section("subtitle") Server @endsection
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
        <a href="{{route('server.create')}}" style="padding:13px;" class="btn btn-app">
            <i class="fa fa-edit"></i> Tambah
        </a>
        @else
        <a href="" style="padding:13px;" class="btn btn-app disabled">
            <i class="fa fa-edit"></i> Tambah
        </a>
        @endif

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Request</th>
                    <th>Requester Name</th>
                    <th>OS</th>
                    <th>RAM</th>
                    <th>CPU</th>
                    <th>Disk</th>
                    <th>Environtment</th>
                    <th>Aplikasi</th>
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
                @foreach($server as $serv)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>RS{{$serv->id}}</td>
                    <td>{{$serv->requester_name}}</td>
                    <td>
                        {{$serv->os}}
                    </td>
                    <td>
                        {{$serv->ram}} GB
                    </td>
                    <td>
                        {{$serv->cpu}}
                    </td>
                    <td>
                        {{$serv->disk}} GB
                    </td>
                    <td>
                        {{$serv->environtment}}
                    </td>
                    <td>
                        {{$serv->aplikasi}}
                    </td>
                    <td>
                        {{$serv->description}}
                    </td>
                    <td>
                        {{$serv->created_at}}
                    </td>
                    <td>
                        @if($serv->worked_date == NULL)
                        <span class="badge badge-info">
                            Waiting
                        </span>
                        @else
                        {{$serv->worked_date}}
                        @endif
                    </td>
                    <td>
                        @if($serv->checked_by == NULL)
                        <span class="badge badge-info">
                            Waiting
                        </span>
                        @else
                        {{$serv->checked_by}}
                        @endif
                    </td>
                    <td>
                        @if($serv->status_checked == "Pending")
                        <span class="badge badge-warning">
                            {{$serv->status_checked}}
                        </span>
                        @else
                        <span class="badge badge-success">
                            {{$serv->status_checked}}
                        </span>
                        @endif
                    </td>
                    <td>
                        @if($serv->approved_by == NULL)
                        <span class="badge badge-info">
                            Waiting
                        </span>
                        @else
                        {{$serv->approved_by}}
                        @endif
                    </td>
                    <td>
                        @if($serv->status_approval == "Approved")
                        <span class="badge badge-success">
                            {{$serv->status_approval}}
                        </span>
                        @elseif($serv->status_approval == "Pending")
                        <span class="badge badge-warning">
                            {{$serv->status_approval}}
                        </span>
                        @else
                        <span class="badge badge-danger">
                            {{$serv->status_approval}}
                        </span>
                        @endif
                    </td>
                    <td>
                        @if(Auth::user()->roles == "USER")
                            <?php $step = 4; ?>
                        @else
                            <?php $step = 1; ?>
                        @endif
                        

                        @if(Auth::user()->roles == "ADMIN" && $serv->status_approval == "Pending")
                            <form action="{{route('server.approvemgr', ['id'=>$serv->id])}}" method="POST">
                                @csrf
                                <input type="hidden" value="PUT" name="_method">
                                <input type="submit" class="btn btn-success btn-sm" value="Approve">
                            </form>
                            <form action="{{route('server.disapprovemgr', ['id'=>$serv->id])}}" method="POST">
                                @csrf
                                <input type="hidden" value="PUT" name="_method">
                                <input type="submit" class="btn btn-danger btn-sm" value="Disapprove">
                            </form>
                        @elseif(Auth::user()->roles == "STAFF" && $serv->step == 1)
                            <form class="d-inline" action="{{route('server.approvestaffw', ['id'=>$serv->id])}}" method="POST" onsubmit="return confirm('Approve This Request?')">
                                @csrf
                                <input type="hidden" value="PUT" name="_method">
                                <input type="submit" class="btn btn-success btn-sm" value="Approve">
                            </form>
                        @elseif(Auth::user()->roles == "STAFF" && $serv->step == 2)
                            <form class="d-inline" action="{{route('server.approvestaffc', ['id'=>$serv->id])}}" method="POST" onsubmit="return confirm('Approve This Request?')">
                                @csrf
                                <input type="hidden" value="PUT" name="_method">
                                <input type="submit" class="btn btn-success btn-sm" value="Approve">
                            </form>
                        @elseif($serv->step == 3 && $step != 4 || Auth::user()->roles == "ADMIN" || Auth::user()->roles == "STAFF")
                            <a class="btn btn-success btn-sm disabled">Done</a>        
                        @endif
                        <a class="btn btn-info text-white btn-sm" href="{{route('server.show', ['id'=>$serv->id])}}">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

@endsection