@extends('layouts.global')
@section("title") List Order @endsection
@section("subtitle") Link @endsection
@section("content")
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Order</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if(Auth::user()->roles == "USER")
        <a href="{{route('orderlink.create')}}" style="padding:13px;" class="btn btn-app">
            <i class="fa fa-edit"></i> Tambah
        </a>
        @else
        <a href="" style="padding:13px;" class="btn btn-app disabled">
            <i class="fa fa-edit"></i> Tambah
        </a>
        @endif

        @if(Auth::user()->roles != "USER")
        <a href="{{route('orderlink.export')}}" class="btn btn-success my-3" target="_blank" style="float:right;margin-right:5px;">
            <div class="tooltop">
                <i class="nav-icon fa  fa-download"></i>
                <span class="tooltiptextteng">Unduh</span>
            </div>
        </a>
        @endif

        <form action="{{route('orderlink.index')}}">
            <input type="text" name="from" id="from" style="display:none" value="{{Request::get('from')}}">
            <input type="text" name="to" id="to" style="display:none" value="{{Request::get('to')}}">

            <div class="form-group" style="margin-left:15px;">
                <button class="btn btn-info my-3" style="display:inline">
                    <div class="tooltop">
                        <i class="nav-icon fa fa-filter"></i>
                        <span class="tooltiptextteng">Sort</span>
                    </div>
                </button>
                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;width: fit-content;;display:inline">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>


            </div>
        </form>

        <table id="example1" class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>
                        <div style="width: 100px;text-align:center">No</div>
                    </th>
                    <th>
                        <div style="width: 145px;text-align:center">Id Request</div>
                    </th>
                    <th>
                        <div style="width: 195px;text-align:center">Requester Name</div>
                    </th>
                    <th>
                        <div style="width: 200px;text-align:center">Nama Perusahaan</div>
                    </th>
                    <th>
                        <div style="width: 200px;text-align:center">Alamat Data Center</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">No. Telepon Referensi</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">Nama PIC</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">No Telp & Email PIC</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">Provider Link</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">Jenis Link</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">Backhaul</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">Bandwidth Link</div>
                    </th>
                    <th>
                        <div style="width: 320px;text-align:center">Beban Instalasi Kabel Gedung (IKG)</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">Delivery Target Date</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">Request Date</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">Worked Date</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">Status Cheked</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">Status Worked</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">Status Approval</div>
                    </th>
                    <th>
                        <div style="width: 220px;text-align:center">Action</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderlink as $olink)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>OL{{$olink->id}}</td>
                    <td>{{$olink->requester_name}}</td>
                    <td>
                        {{$olink->namaperusahaan}}
                    </td>
                    <td>
                        {{$olink->address}}
                    </td>
                    <td>
                        {{$olink->notelpon}}
                    </td>
                    <td>
                        {{$olink->namapic}}
                    </td>
                    <td>
                        {{$olink->nopic}} - {{$olink->emailpic}}
                    </td>
                    <td>
                        {{$olink->providerlink}}
                    </td>
                    <td>
                        {{$olink->jenislink}}
                    </td>
                    <td>
                        {{$olink->backhaul}}
                    </td>
                    <td>
                        {{$olink->bandwidthlink}}
                    </td>
                    <td>
                        {{$olink->ikg}}
                    </td>
                    <td>
                        {{$olink->targetdate}}
                    </td>
                    <td>
                        {{$olink->request_date}}
                    </td>
                    <td>
                        <div style="text-align:center">
                            @if($olink->worked_date == NULL)
                            <span class="badge badge-info">
                                Waiting
                            </span>
                            @else
                            {{$olink->worked_date}}
                            @endif
                        </div>
                    </td>
                    <td>
                        <div style="text-align:center">
                            @if($olink->status_checked == "Pending")
                            <span class="badge badge-warning">
                                {{$olink->status_checked}}
                            </span>
                            @else
                            <span class="badge badge-success">
                                {{$olink->status_checked}}
                            </span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div style="text-align:center">
                            @if($olink->status_worked == "Pending")
                            <span class="badge badge-warning">
                                {{$olink->status_checked}}
                            </span>
                            @else
                            <span class="badge badge-success">
                                {{$olink->status_worked}}
                            </span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div style="text-align:center">
                            @if($olink->status_approval == "Approved")
                            <span class="badge badge-success">
                                {{$olink->status_approval}}
                            </span>
                            @elseif($olink->status_approval == "Pending")
                            <span class="badge badge-warning">
                                {{$olink->status_approval}}
                            </span>
                            @else
                            <span class="badge badge-danger">
                                {{$olink->status_approval}}
                            </span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div style="text-align:center">

                            @if(Auth::user()->roles == "USER")
                            <?php $step = 4; ?>
                            @else
                            <?php $step = 1; ?>
                            @endif

                            @if(Auth::user()->roles == "ADMIN" && $olink->status_approval == "Pending")
                            <form action="{{route('orderlink.approvemgr', ['id'=>$olink->id])}}" method="POST" onsubmit="return confirm('Approve This Request?')">
                                @csrf
                                <div class="tooltop">
                                    <input type="hidden" value="PUT" name="_method">
                                    <input type="hidden" value="{{$olink->id}}" name="id_request">
                                    <input type="hidden" value="OL{{$olink->id}}" name="unique_request">
                                    <input type="hidden" value="Approval" name="role">
                                    <button type="submit" class="btn btn-success btn-ius">
                                        <i class="nav-icon fa fa-check-square-o"></i>
                                    </button>
                                    <span class="tooltiptextteng">Approve</span>
                                </div>
                            </form>

                            <form action="{{route('orderlink.disapprovemgr', ['id'=>$olink->id])}}" method="POST" onsubmit="return confirm('Dispprove This Request?')">
                                @csrf
                                <div class="tooltop">

                                    <input type="hidden" value="PUT" name="_method">
                                    <input type="hidden" value="{{$olink->id}}" name="id_request">
                                    <input type="hidden" value="OL{{$olink->id}}" name="unique_request">
                                    <input type="hidden" value="Disapproval" name="role">
                                    <button type="submit" class="btn btn-danger btn-ius">
                                        <i class="nav-icon fa fa-remove"></i>
                                    </button>
                                    <span class="tooltiptextteng">Disapprove</span>
                                </div>
                            </form>
                            @elseif(Auth::user()->roles == "STAFF" && $olink->step == 1)
                            <form class="d-inline" action="{{route('orderlink.approvestaffw', ['id'=>$olink->id])}}" method="POST" onsubmit="return confirm('Approve This Request?')">
                                @csrf
                                <div class="tooltop">
                                    <input type="hidden" value="PUT" name="_method">
                                    <input type="hidden" value="{{$olink->id}}" name="id_request">
                                    <input type="hidden" value="OL{{$olink->id}}" name="unique_request">
                                    <input type="hidden" value="Working" name="role">
                                    <button type="submit" class="btn btn-success btn-ius">
                                        <i class="nav-icon fa fa-check-square-o"></i>
                                    </button>
                                    <span class="tooltiptextteng">Approve</span>
                                </div>
                            </form>
                            @elseif(Auth::user()->roles == "STAFF" && $olink->step == 2)
                            <form class="d-inline" action="route('orderlink.approvestaffc', ['id'=>$olink->id])}}" method="POST" onsubmit="return confirm('Approve This Request?')">
                                @csrf
                                <div class="tooltop">
                                    <input type="hidden" value="PUT" name="_method">
                                    <input type="hidden" value="{{$olink->id}}" name="id_request">
                                    <input type="hidden" value="OL{{$olink->id}}" name="unique_request">
                                    <input type="hidden" value="Checking" name="role">
                                    <button type="submit" class="btn btn-success btn-ius">
                                        <i class="nav-icon fa fa-check-square-o"></i>
                                    </button>
                                    <span class="tooltiptextteng">Approve</span>
                                </div>
                            </form>
                            @elseif($olink->step == 3 && $step != 4 || Auth::user()->roles == "ADMIN" || Auth::user()->roles == "STAFF")
                            <a class="btn btn-success btn-ius disabled">
                                <div class="tooltop"><i class="nav-icon fa  fa-check-square-o" style="float:center"></i>
                                    <span class="tooltiptextteng">Done</span>
                                </div>
                            </a>
                            @endif

                            @if(Auth::user()->roles == "USER" && Auth::user()->name == $olink->requester_name && $olink->step == 0)
                            <a class="btn btn-primary text-white btn-ius" href="{{route('orderlink.edit', ['id'=>$olink->id])}}">
                                <div class="tooltop"><i class="nav-icon fa  fa-edit" style="float:center"></i>
                                    <span class="tooltiptextteng">Edit</span>
                                </div>
                            </a>
                            @endif
                            <a class="btn btn-info text-white btn-ius" href="{{route('orderlink.show', ['id'=>$olink->id])}}">
                                <div class="tooltop"><i class="nav-icon fa  fa-search" style="float:center"></i>
                                    <span class="tooltiptextteng">Detail</span>
                                </div>
                            </a>
                        </div>
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