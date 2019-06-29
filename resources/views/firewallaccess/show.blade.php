@extends('layouts.global')
@section("title") Detail @endsection
@section("subtitle") Firewall Request @endsection
@section("content")
<div class="container-fluid">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Request Firewall</h3>
        </div>
        <div class="card-body">
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
                        <th>Period</th>
                        <th>Project</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>FW{{$firewallaccesss->id}}</td>
                        <td>@if($firewallaccesss->step == 3)
                            <span class="badge badge-success">
                                Active
                            </span>
                            @else
                            <span class="badge badge-info">
                                Waiting
                            </span>
                            @endif
                        </td>
                        <td>{{$firewallaccesss->requester_name}}</td>
                        <td>
                            {{$firewallaccesss->source}}
                        </td>
                        <td>
                            {{$firewallaccesss->destination}}
                        </td>
                        <td>
                            {{$firewallaccesss->port}}
                        </td>
                        <td>
                            {{$firewallaccesss->access_period}}
                        </td>
                        <td>
                            {{$firewallaccesss->project_name}}
                        </td>
                        <td>
                            {{$firewallaccesss->description}}
                        </td>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Approval Firewall</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Request</th>
                        <th>Role Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>FW{{$firewallaccesss->id}}</td>
                        <td>@if($firewallaccesss->approved_by == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                                    
                            @else
                                {{$firewallaccesss->approved_by}}
                            @endif
                        </td>
                        <td>Approval</td>
                        <td>@if($firewallaccesss->status_approval == "Approved")
                                <span class="badge badge-success">
                                    Approved
                                </span>
                            @else
                                <span class="badge badge-warning">
                                    Pending
                                </span>
                            @endif
                        </td>
                        <td>@if($firewallaccesss->approved_date == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>  
                            @else
                                {{$firewallaccesss->approved_date}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>FW{{$firewallaccesss->id}}</td>
                        <td>@if($firewallaccesss->worked_by == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                            @else
                                {{$firewallaccesss->worked_by}}
                            @endif
                        </td>
                        <td>Working</td>
                        <td>@if($firewallaccesss->status_worked == "Approved")
                                <span class="badge badge-success">
                                    Approved
                                </span>
                            @else
                                <span class="badge badge-warning">
                                    Pending
                                </span>
                            @endif
                        </td>
                        <td>@if($firewallaccesss->worked_date == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                                    
                            @else
                                {{$firewallaccesss->worked_date}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>FW{{$firewallaccesss->id}}</td>
                        <td>@if($firewallaccesss->checked_by == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                                    
                            @else
                                {{$firewallaccesss->checked_by}}
                            @endif
                        </td>
                        <td>Checking</td>
                        <td>@if($firewallaccesss->status_checked == "Approved")
                                <span class="badge badge-success">
                                    Approved
                                </span>
                            @else
                                <span class="badge badge-warning">
                                    Pending
                                </span>
                            @endif
                        </td>
                        <td>@if($firewallaccesss->checked_date == NULL)
                                <span class="badge badge-info">
                                    Waiting
                                </span>
                                    
                            @else
                                {{$firewallaccesss->checked_date}}
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
                        <th>No</th>
                        <th>Id Request</th>
                        <th>Period</th>
                        <th>Date Request</th>
                        <th>Status Request</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>FW{{$firewallaccesss->id}}</td>
                        <td>{{$firewallaccesss->access_period}}</td>
                        <td>{{$firewallaccesss->created_at}}</td>
                        <td>@if($firewallaccesss->step == 3)
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