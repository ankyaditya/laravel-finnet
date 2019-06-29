@extends('layouts.global')
@section("title") Create @endsection
@section("subtitle") New User @endsection
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
        <form enctype="multipart/form-data" action="{{route('users.store')}}" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label for="username">Userame</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="name">Roles</label>
              <br>
              <input type="radio" class="flat-red" name="roles" id="ADMIN" value="ADMIN">
              <label for="ADMIN">Administrator</label>

              <input type="radio" class="flat-red" name="roles" id="STAFF" value="STAFF">
              <label for="STAFF">Staff</label>

              <input type="radio" class="flat-red" name="roles" id="STAFF" value="USER">
              <label for="USER">User</label>
              </label>
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone number">
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea name="address" id="address" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="avatar">Avatar Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="form-control" id="avatar" name="avatar">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
            </div>
            <div class="form-group">
              <label for="password_confirmation">Password Confirmantion</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password Confirmation">
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary" value="Save">Submit</button>
              <button type="submit" class="btn btn-default float-right">Cancel</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  @endsection