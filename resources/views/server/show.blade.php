@extends('layouts.global')
@section("title") Detail @endsection
@section("subtitle") Request Server @endsection
@section("content")
<div class="container-fluid">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Request Server</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-responsive ">
                <thead>
                    <tr>
                    <th><div style="width: 40px;text-align:center">No</div></th>
                    <th><div style="width: 100px;text-align:center">Id Request</div></th>
                    <th><div style="width: 200px;text-align:center ">Requester Name</div></th>
                    <th><div style="width: 200px;text-align:center ">OS</div></th>
                    <th><div style="width: 200px;text-align:center ">RAM</div></th>
                    <th><div style="width: 200px;text-align:center ">CPU</div></th>
                    <th><div style="width: 150px;text-align:center ">Disk</div></th>
                    <th><div style="width: 150px;text-align:center ">Environtment</div></th>
                    <th><div style="width: 300px;text-align:center ">Aplikasi</div></th>
                    <th><div style="width: 200px;text-align:center ">Description</div></th>
                    <th><div style="width: 250px;text-align:center ">File</div></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>RS{{$server->id}}</td>
                        <td>{{$server->requester_name}}</td>
                        <td>
                            {{$server->os}}
                        </td>
                        <td>
                            {{$server->ram}} GB
                        </td>
                        <td>
                            {{$server->cpu}}
                        </td>
                        <td>
                            {{$server->disk}} GB
                        </td>
                        <td>
                            {{$server->environtment}}
                        </td>
                        <td>
                            {{$server->aplikasi}}
                        </td>
                        <td>
                            {{$server->description}}
                        </td>
                        <td>
                            @if($server->file)
                                <a href="{{asset('storage/'. $server->file)}}" download>Download</a>
                            @else
                                No File
                            @endif
                        </td>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Approval User OS</h3>
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
                        <td>RS{{$server->id}}</td>
                        <td>@if($server->approved_by == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                                    
                            @else
                                {{$server->approved_by}}
                            @endif
                        </td>
                        <td>Approval</td>
                        <td>@if($server->status_approval == "Approved")
                                <span class="badge badge-success">
                                    Approved
                                </span>
                            @elseif($server->status_approval == "Pending")
                                <span class="badge badge-warning">
                                    Pending
                                </span>
                            @else  
                                <span class="badge badge-danger">
                                    Disaprove
                                </span>
                            @endif
                        </td>
                        <td>@if($server->approved_date == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>  
                            @else
                                {{$server->approved_date}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>RS{{$server->id}}</td>
                        <td>@if($server->worked_by == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                            @else
                                {{$server->worked_by}}
                            @endif
                        </td>
                        <td>Working</td>
                        <td>@if($server->status_worked == "Approved")
                                <span class="badge badge-success">
                                    Approved
                                </span>
                            @else
                                <span class="badge badge-warning">
                                    Pending
                                </span>
                            @endif
                        </td>
                        <td>@if($server->worked_date == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                                    
                            @else
                                {{$server->worked_date}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>RS{{$server->id}}</td>
                        <td>@if($server->checked_by == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                                    
                            @else
                                {{$server->checked_by}}
                            @endif
                        </td>
                        <td>Checking</td>
                        <td>@if($server->status_checked == "Approved")
                                <span class="badge badge-success">
                                    Approved
                                </span>
                            @else
                                <span class="badge badge-warning">
                                    Pending
                                </span>
                            @endif
                        </td>
                        <td>@if($server->checked_date == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                                    
                            @else
                                {{$server->checked_date}}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Period Firewall</h3>
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
                        <td>RS{{$server->id}}</td>
                        <td>{{$server->created_at}}</td>
                        <td>@if($server->step == 3)
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