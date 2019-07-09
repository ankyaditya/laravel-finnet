@extends('layouts.global')
@section("title") Edit @endsection
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
                    <h3 class="card-title">Edit Data</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" action="{{route('firewallaccess.update', ['id'=>$firewallaccesss->id])}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <select class="form-control select2" style="width: 100%;" id="project_name" name="project_name" required>
                                <option selected="selected">{{$firewallaccesss->project_name}}</option>
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
                                <option selected="selected">{{$firewallaccesss->source}}</option>
                                @foreach($ipaddress as $ip)
                                    <option value="{{$ip->ip}} - {{$ip->name}}">{{$ip->ip}} - {{$ip->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>IP Destination</label>
                            <select class="form-control select2" style="width: 100%;" id="destination" name="destination" required>
                                <option selected="selected">{{$firewallaccesss->destination}}</option>
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
                                <input value="{{old('port') ? old('port'): $firewallaccesss->port}}" type="number" class="form-control" id="port" name="port" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" required>{{old('description') ? old('description'): $firewallaccesss->description}}</textarea>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" value="Simpan">Submit</button>
                            <a class="btn btn-default float-right" href="{{route('firewallaccess.index')}}">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection