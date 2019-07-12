@extends('layouts.global')
@section("title") Edit @endsection
@section("subtitle") Profil @endsection
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
                <form enctype="multipart/form-data" action="{{route('home.update', ['id'=>Auth::user()->id])}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input value="{{Auth::user()->name}}" type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Userame</label>
                            <input value="{{Auth::user()->username}}" type="text" disabled class="form-control" id="username" name="username" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input value="{{Auth::user()->phone}}" type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control" required>{{Auth::user()->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="avatar">Avatar Image</label>
                            <br>
                            Current avatar: <br>
                            @if(Auth::user()->avatar)
                            <img src="{{asset('storage/'.Auth::user()->avatar)}}" width="120px" />
                            <br>
                            @else
                            No avatar
                            @endif
                            <br>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="avatar" name="avatar">
                                </div>
                            </div>
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" value="Simpan">Submit</button>
                            <a class="btn btn-default float-right" href="{{route('home.profile')}}">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @endsection