@extends('layouts.global')
@section("title") List Request @endsection
@section("subtitle") Access Firewall @endsection
@section("content")
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Access</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if(Auth::user()->roles == "USER")
        <a href="{{route('firewallaccess.create')}}" style="padding:13px;" class="btn btn-app">
            <i class="fa fa-edit"></i> Tambah
        </a>
        @else
        <a href="" style="padding:13px;" class="btn btn-app disabled">
            <i class="fa fa-edit"></i> Tambah
        </a>
        @endif
        
        @if(Auth::user()->roles != "USER")
        <a href="{{route('firewallaccess.export')}}" class="btn btn-success my-3" target="_blank" style="float:right;margin-right:5px;">
            <div class="tooltop">
                <i class="nav-icon fa  fa-download"></i>
                <span class="tooltiptextteng">Unduh</span>
            </div>
        </a>
        @endif

        <form action="{{route('firewallaccess.index')}}">
            <input type="text" name="from" id="from" style="display:none" value="{{Request::get('from')}}">
            <input type="text" name="to" id="to" style="display:none" value="{{Request::get('to')}}">

            <div class="form-group" style="margin-left:15px;">

                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;width: fit-content;">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>

                <button class="btn btn-info my-3">
                    <div class="tooltop">
                        <i class="nav-icon fa fa-filter"></i>
                        <span class="tooltiptextteng">Sort</span>
                    </div>
                </button>
            </div>
        </form>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Request</th>
                    <th>Status</th>
                    <th>Requester Name</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Port</th>
                    <th>Project</th>
                    <th>Request Date</th>
                    <th>Worked Date</th>
                    <th>Status Cheked</th>
                    <th>Status Worked</th>
                    <th>Status Approval</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($firewallaccesss as $firewallaccess)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>FW{{$firewallaccess->id}}</td>
                    <td>@if($firewallaccess->step == 3)
                        <span class="badge badge-success">
                            Active
                        </span>
                        @else
                        <span class="badge badge-info">
                            Waiting
                        </span>
                        @endif
                    </td>
                    <td>{{$firewallaccess->requester_name}}</td>
                    <td>
                        {{$firewallaccess->source}}
                    </td>
                    <td>
                        {{$firewallaccess->destination}}
                    </td>
                    <td>
                        {{$firewallaccess->port}}
                    </td>
                    <td>
                        {{$firewallaccess->project_name}}
                    </td>
                    <td>
                        {{$firewallaccess->request_date}}
                    </td>
                    <td>
                        @if($firewallaccess->worked_date == NULL)
                        <span class="badge badge-info">
                            Waiting
                        </span>
                        @else
                        {{$firewallaccess->worked_date}}
                        @endif
                    </td>
                    <td>
                        @if($firewallaccess->status_checked == "Pending")
                        <span class="badge badge-warning">
                            {{$firewallaccess->status_checked}}
                        </span>
                        @else
                        <span class="badge badge-success">
                            {{$firewallaccess->status_checked}}
                        </span>
                        @endif
                    </td>
                    <td>
                        @if($firewallaccess->status_worked == "Pending")
                        <span class="badge badge-warning">
                            {{$firewallaccess->status_checked}}
                        </span>
                        @else
                        <span class="badge badge-success">
                            {{$firewallaccess->status_worked}}
                        </span>
                        @endif
                    </td>
                    <td>
                        @if($firewallaccess->status_approval == "Approved")
                        <span class="badge badge-success">
                            {{$firewallaccess->status_approval}}
                        </span>
                        @elseif($firewallaccess->status_approval == "Pending")
                        <span class="badge badge-warning">
                            {{$firewallaccess->status_approval}}
                        </span>
                        @else
                        <span class="badge badge-danger">
                            {{$firewallaccess->status_approval}}
                        </span>
                        @endif
                    </td>
                    <td>

                        @if(Auth::user()->roles == "USER")
                        <?php $step = 4; ?>
                        @else
                        <?php $step = 1; ?>
                        @endif

                        @if(Auth::user()->roles == "ADMIN" && $firewallaccess->status_approval == "Pending")
                        <form action="{{route('firewallaccess.approvemgr', ['id'=>$firewallaccess->id])}}" method="POST">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">
                            <input type="submit" class="btn btn-success btn-sm" value="Approve">
                        </form>
                        <form action="{{route('firewallaccess.disapprovemgr', ['id'=>$firewallaccess->id])}}" method="POST">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">
                            <input type="submit" class="btn btn-danger btn-sm" value="Disapprove">
                        </form>
                        @elseif(Auth::user()->roles == "STAFF" && $firewallaccess->step == 1)
                        <form class="d-inline" action="{{route('firewallaccess.approvestaffw', ['id'=>$firewallaccess->id])}}" method="POST">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">
                            <input type="submit" class="btn btn-success btn-sm" value="Approve">
                        </form>
                        @elseif(Auth::user()->roles == "STAFF" && $firewallaccess->step == 2)
                        <form class="d-inline" action="{{route('firewallaccess.approvestaffc', ['id'=>$firewallaccess->id])}}" method="POST">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">
                            <input type="submit" class="btn btn-success btn-sm" value="Approve">
                        </form>
                        @elseif($firewallaccess->step == 3 && $step != 4 || Auth::user()->roles == "ADMIN" || Auth::user()->roles == "STAFF")
                        <a class="btn btn-success btn-sm disabled">Done</a>
                        @endif

                        @if(Auth::user()->roles == "USER" && Auth::user()->name == $firewallaccess->requester_name && $firewallaccess->step == 0)
                        <a class="btn btn-info text-white btn-sm" href="{{route('firewallaccess.edit', ['id'=>$firewallaccess->id])}}">Edit</a>
                        @endif
                        <a class="btn btn-info text-white btn-sm" href="{{route('firewallaccess.show', ['id'=>$firewallaccess->id])}}">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            document.getElementById('from').value = start.format('YYYY-MM-DD');
            document.getElementById('to').value = end.format('YYYY-MM-DD');
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    });
</script>
@endsection