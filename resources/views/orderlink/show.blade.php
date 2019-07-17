@extends('layouts.global')
@section("title") Detail @endsection
@section("subtitle") Order Link @endsection
@section("content")
<div class="container-fluid">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Order Link</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                    <th><div style="width: 100px;text-align:center">No</div></th>
                    <th><div style="width: 145px;text-align:center">Id Request</div></th>
                    <th><div style="width: 195px;text-align:center">Requester Name</div></th>
                    <th><div style="width: 200px;text-align:center">Nama Perusahaan</div></th>
                    <th><div style="width: 200px;text-align:center">Alamat Data Center</div></th>
                    <th><div style="width: 220px;text-align:center">No. Telepon Referensi</div></th>
                    <th><div style="width: 220px;text-align:center">Nama PIC</div></th>
                    <th><div style="width: 220px;text-align:center">No Telp & Email PIC</div></th>
                    <th><div style="width: 220px;text-align:center">Provider Link</div></th>
                    <th><div style="width: 220px;text-align:center">Jenis Link</div></th>
                    <th><div style="width: 220px;text-align:center">Backhaul</div></th>
                    <th><div style="width: 220px;text-align:center">Bandwidth Link</div></th>
                    <th><div style="width: 320px;text-align:center">Beban Instalasi Kabel Gedung (IKG)</div></th>
                    <th><div style="width: 220px;text-align:center">Delivery Target Date</div></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>OL{{$orderlink->id}}</td>
                        <td>{{$orderlink->requester_name}}</td>
                        <td>
                            {{$orderlink->namaperusahaan}}
                        </td>
                        <td>
                            {{$orderlink->address}}
                        </td>
                        <td>
                            {{$orderlink->notelpon}}
                        </td>
                        <td>
                            {{$orderlink->namapic}}
                        </td>
                        <td>
                            {{$orderlink->nopic}} - {{$orderlink->emailpic}}
                        </td>
                        <td>
                            {{$orderlink->providerlink}}
                        </td>
                        <td>
                            {{$orderlink->jenislink}}
                        </td>
                        <td>
                            {{$orderlink->backhaul}}
                        </td>
                        <td>
                            {{$orderlink->bandwidthlink}}
                        </td>
                        <td>
                            {{$orderlink->ikg}}
                        </td>
                        <td>
                            {{$orderlink->targetdate}}
                        </td>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Approval Order Link</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><div style="text-align:center">No</div></th>
                        <th><div style="text-align:center">Id Request</div></th>
                        <th><div style="text-align:center">Role Name</div></th>
                        <th><div style="text-align:center">Role</div></th>
                        <th><div style="text-align:center">Status</div></th>
                        <th><div style="text-align:center">Date</div></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>FW{{$orderlink->id}}</td>
                        <td>@if($orderlink->approved_by == NULL)
                            <span class="badge badge-info">
                                Waiting
                            </span>

                            @else
                            {{$orderlink->approved_by}}
                            @endif
                        </td>
                        <td>Approval</td>
                        <td>@if($orderlink->status_approval == "Approved")
                            <span class="badge badge-success">
                                Approved
                            </span>
                            @elseif($orderlink->status_approval == "Pending")
                            <span class="badge badge-warning">
                                Pending
                            </span>
                            @else
                            <span class="badge badge-danger">
                                Disaprove
                            </span>
                            @endif
                        </td>
                        <td>@if($orderlink->approved_date == NULL)
                            <span class="badge badge-info">
                                Waiting
                            </span>
                            @else
                            {{$orderlink->approved_date}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>OL{{$orderlink->id}}</td>
                        <td>@if($orderlink->worked_by == NULL)
                            <span class="badge badge-info">
                                Waiting
                            </span>
                            @else
                            {{$orderlink->worked_by}}
                            @endif
                        </td>
                        <td>Working</td>
                        <td>@if($orderlink->status_worked == "Approved")
                            <span class="badge badge-success">
                                Approved
                            </span>
                            @else
                            <span class="badge badge-warning">
                                Pending
                            </span>
                            @endif
                        </td>
                        <td>@if($orderlink->worked_date == NULL)
                            <span class="badge badge-info">
                                Waiting
                            </span>

                            @else
                            {{$orderlink->worked_date}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>OL{{$orderlink->id}}</td>
                        <td>@if($orderlink->checked_by == NULL)
                            <span class="badge badge-info">
                                Waiting
                            </span>

                            @else
                            {{$orderlink->checked_by}}
                            @endif
                        </td>
                        <td>Checking</td>
                        <td>@if($orderlink->status_checked == "Approved")
                            <span class="badge badge-success">
                                Approved
                            </span>
                            @else
                            <span class="badge badge-warning">
                                Pending
                            </span>
                            @endif
                        </td>
                        <td>@if($orderlink->checked_date == NULL)
                            <span class="badge badge-info">
                                Waiting
                            </span>

                            @else
                            {{$orderlink->checked_date}}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Period Link</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><div style="text-align:center">No</div></th>
                        <th><div style="text-align:center">Id Request</div></th>
                        <th><div style="text-align:center">Date Request</div></th>
                        <th><div style="text-align:center">Status Request</div></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>OL{{$orderlink->id}}</td>
                        <td>{{$orderlink->created_at}}</td>
                        <td>@if($orderlink->step == 3)
                            <span class="badge badge-success">
                                Active
                            </span>
                            @else
                            <span class="badge badge-info">
                                Waiting
                            </span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection