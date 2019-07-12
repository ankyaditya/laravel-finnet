@extends('layouts.global')
@section("title") Request @endsection
@section("subtitle") User OS @endsection
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
                    <h3 class="card-title">User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" action="{{route('useros.store')}}" method="POST">
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
                            <label>Username</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>IP Server</label>
                            <select class="form-control select2" style="width: 100%;" id="source" name="source" required>
                                <option value="">-</option>
                                @foreach($ipaddress as $ip)
                                    <option value="{{$ip->ip}}">{{$ip->ip}} - {{$ip->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Roles</label>
                            <br>
                            <input type="radio" class="flat-red" name="roles" id="ADMIN" value="ADMIN" required>
                            <label for="ADMIN">Administrator</label>
                            <input type="radio" class="flat-red" name="roles" id="STAFF" value="USER">
                            <label for="USER">User</label>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description" required></textarea>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" value="Save">Submit</button>
                            <button type="submit" class="btn btn-default float-right">Cancel</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @endsection