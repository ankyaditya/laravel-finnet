@extends('layouts.global')
@section("title") Request @endsection
@section("subtitle") Access Firewall @endsection
@section("content")
<div class="container-fluid">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Data Request</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" action="{{route('firewallaccess.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <select class="form-control select2" style="width: 100%;" id="project_name" name="project_name" placeholder="Enter Project Name" required>
                                <option value="">-</option>
                                <option>Bill Payment Aggregator</option>
                                <option>Electronic Payment Platform</option>
                                <option>Online Payment Solution</option>
                                <option>CHDE</option>
                                <option>Infrastructure Crew</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>IP Source</label>
                            <select class="form-control select2" style="width: 100%;" id="source" name="source" required>
                                <option value="">-</option>
                                @foreach($ipaddress as $ip)
                                    <option value="{{$ip->ip}} - {{$ip->name}}">{{$ip->ip}} - {{$ip->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>IP Destination</label>
                            <select class="form-control select2" style="width: 100%;" id="destination" name="destination" required>
                                <option value="">-</option>
                                @foreach($ipaddress as $ip)
                                    <option value="{{$ip->ip}} - {{$ip->name}}">{{$ip->ip}} - {{$ip->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Port</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="number" class="form-control" id="port" name="port" placeholder="Enter Port" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Making Access Period</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                                <input type="date" class="form-control float-right" id="access_period" name="access_period" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description" required></textarea>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" value="Save">Submit</button>
                            <a class="btn btn-default float-right" href="{{route('firewallaccess.index')}}">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @endsection