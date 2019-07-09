@extends('layouts.global')
@section("title") Edit @endsection
@section("subtitle") User @endsection
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
                <div class="card-body">
                    <b>Name:</b> <br />
                    {{$user->name}}
                    <br><br>
                    @if($user->avatar)
                    <img src="{{asset('storage/'. $user->avatar)}}" width="128px" />
                    @else
                    No avatar
                    @endif
                    <br>
                    <br>
                    <b>Username:</b><br>
                    {{$user->username}}
                    <br>
                    <br>
                    <b>Phone number</b> <br>
                    {{$user->phone}}
                    <br><br>
                    <b>Address</b> <br>
                    {{$user->address}}

                    <br>
                    <br>
                    <b>Roles:</b> <br>
                    {{$user->roles}}
                    <br>
                    <br>
                    <b>Divisi:</b> <br>
                    {{$user->divisi}}
                </div>
            </div>
        </div>
    </div>
@endsection