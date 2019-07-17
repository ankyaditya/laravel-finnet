@extends('layouts.global')
@section("title") Detail @endsection
@section("subtitle") Request User OS @endsection
@section("content")
<div class="container-fluid">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Request User OS</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th><div style="width: 40px;text-align:center">No</div></th>
                    <th><div style="width: 100px;text-align:center">Id Request</div></th>
                    <th><div style="width: 200px;text-align:center ">Requester Name</div></th>
                    <th><div style="width: 200px;text-align:center ">IP Server</div></th>
                    <th><div style="width: 200px;text-align:center ">Role</div></th>
                    <th><div style="width: 200px;text-align:center ">Project Name</div></th>
                    <th><div style="width: 250px;text-align:center ">Description</div></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>OS{{$useros->id}}</td>
                        <td>{{$useros->requester_name}}</td>
                        <td>
                            {{$useros->source}}
                        </td>
                        <td>
                            {{$useros->roles}}
                        </td>
                        <td>
                            {{$useros->project_name}}
                        </td>
                        <td>
                            {{$useros->description}}
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
                        <th><div style="text-align:center">ID Request</div></th>
                        <th><div style="text-align:center">Role Name</div></th>
                        <th><div style="text-align:center">Role</div></th>
                        <th><div style="text-align:center">Status</div></th>
                        <th><div style="text-align:center">Date</div></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>FW{{$useros->id}}</td>
                        <td>@if($useros->approved_by == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                                    
                            @else
                                {{$useros->approved_by}}
                            @endif
                        </td>
                        <td>Approval</td>
                        <td>@if($useros->status_approval == "Approved")
                                <span class="badge badge-success">
                                    Approved
                                </span>
                            @elseif($useros->status_approval == "Pending")
                                <span class="badge badge-warning">
                                    Pending
                                </span>
                            @else  
                                <span class="badge badge-danger">
                                    Disaprove
                                </span>
                            @endif
                        </td>
                        <td>@if($useros->approved_date == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>  
                            @else
                                {{$useros->approved_date}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>FW{{$useros->id}}</td>
                        <td>@if($useros->worked_by == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                            @else
                                {{$useros->worked_by}}
                            @endif
                        </td>
                        <td>Working</td>
                        <td>@if($useros->status_worked == "Approved")
                                <span class="badge badge-success">
                                    Approved
                                </span>
                            @else
                                <span class="badge badge-warning">
                                    Pending
                                </span>
                            @endif
                        </td>
                        <td>@if($useros->worked_date == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                                    
                            @else
                                {{$useros->worked_date}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>FW{{$useros->id}}</td>
                        <td>@if($useros->checked_by == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                                    
                            @else
                                {{$useros->checked_by}}
                            @endif
                        </td>
                        <td>Checking</td>
                        <td>@if($useros->status_checked == "Approved")
                                <span class="badge badge-success">
                                    Approved
                                </span>
                            @else
                                <span class="badge badge-warning">
                                    Pending
                                </span>
                            @endif
                        </td>
                        <td>@if($useros->checked_date == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                                    
                            @else
                                {{$useros->checked_date}}
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
                        <td>FW{{$useros->id}}</td>
                        <td>{{$useros->created_at}}</td>
                        <td>@if($useros->step == 3)
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