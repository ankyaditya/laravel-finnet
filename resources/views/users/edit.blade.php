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
                <!-- form start -->
                <form enctype="multipart/form-data" action="{{route('users.update', ['id'=>$user->id])}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input value="{{old('name') ? old('name') : $user->name}}" type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Userame</label>
                            <input value="{{$user->username}}" type="text" disabled class="form-control" id="username" name="username" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <br>
                            <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="flat-red" id="active" name="status" required>
                            <label for="active">Active</label>
                            <input {{$user->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="flat-red" id="inactive" name="status">
                            <label for="inactive">Inactive</label>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <br>
                            <input {{$user->roles == "ADMIN" ? "checked" : ""}} type="radio" class="flat-red" name="roles" class="form-control id="ADMIN" value="ADMIN" required>
                            <label for="ADMIN">Administrator</label>
                            <input {{$user->roles == "STAFF" ? "checked" : ""}} type="radio" class="flat-red" name="roles" class="form-control id="STAFF" value="STAFF">
                            <label for="STAFF">Staff</label>
                            <input {{$user->roles == "USER" ? "checked" : ""}} type="radio" class="flat-red" name="roles" class="form-control id="USER" value="USER">
                            <label for="STAFF">User</label>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="roles">Divisi</label>
                            <br>
                            <input {{$user->divisi == "NETWORK" ? "checked" : ""}} type="radio" class="flat-red" name="divisi" class="form-control id="NETWORK" value="NETWORK" required>
                            <label for="NETWORK">Network</label>
                            <input {{$user->divisi == "SERVER" ? "checked" : ""}} type="radio" class="flat-red" name="divisi" class="form-control id="SERVER" value="SERVER">
                            <label for="SERVER">Server</label>
                            <input {{$user->divisi == "USER" ? "checked" : ""}} type="radio" class="flat-red" name="divisi" class="form-control id="USER" value="USER">
                            <label for="USER">User</label>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input value="{{old('phone') ? old('phone'): $user->phone}}" type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control" required>{{old('address') ? old('address'): $user->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="avatar">Avatar Image</label>
                            <br>
                            Current avatar: <br>
                            @if($user->avatar)
                            <img src="{{asset('storage/'.$user->avatar)}}" width="120px" />
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
                            <label for="email">Email</label>
                            <input value="{{$user->email}}" type="text" disabled class="form-control" id="email" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" value="Simpan">Submit</button>
                            <a class="btn btn-default float-right" href="{{route('users.index')}}">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @endsection