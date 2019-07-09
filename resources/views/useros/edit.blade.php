@extends('layouts.global')
@section("title") Edit @endsection
@section("subtitle") Data User OS @endsection
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
                    <h3 class="card-title">Operating System</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" action="{{route('useros.update', ['id'=>$useros->id])}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <select class="form-control select2" style="width: 100%;" id="project_name" name="project_name" required>
                                <option selected="selected">{{$useros->project_name}}</option>
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
                                <input value="{{old('username') ? old('username'): $useros->username}}" type="text" class="form-control" id="username" name="username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>IP Server</label>
                            <select class="form-control select2" style="width: 100%;" id="source" name="source" required>
                                <option selected="selected">{{$useros->source}}</option>
                                @foreach($ipaddress as $ip)
                                <option value="{{$ip->ip}} - {{$ip->name}}">{{$ip->ip}} - {{$ip->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <br>
                            <input {{$useros->roles == "ADMIN" ? "checked" : ""}} type="radio" class="flat-red" name="roles" class="form-control id="ADMIN" value="ADMIN" required>
                            <label for="ADMIN">Administrator</label>
                            <input {{$useros->roles == "USER" ? "checked" : ""}} type="radio" class="flat-red" name="roles" class="form-control id="USER" value="USER">
                            <label for="USER">User</label>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" required>{{old('description') ? old('description'): $useros->description}}</textarea>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" value="Simpan">Submit</button>
                            <a class="btn btn-default float-right" href="{{route('useros.index')}}">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @endsection