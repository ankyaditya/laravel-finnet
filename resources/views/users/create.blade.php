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
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
              <label for="name">Roles</label>
              <br>
              <input type="radio" class="flat-red" name="roles" id="ADMIN" value="ADMIN" required>
              <label for="ADMIN">Administrator</label>

              <input type="radio" class="flat-red" name="roles" id="STAFF" value="STAFF">
              <label for="STAFF">Staff</label>

              <input type="radio" class="flat-red" name="roles" id="USER" value="USER">
              <label for="USER">User</label>
              </label>
            </div>
            <div class="form-group">
              <label for="name">Divisi</label>
              <br>
              <input type="radio" class="flat-red" name="divisi" id="NETWORK" value="NETWORK" required>
              <label for="NETWORK">Network</label>

              <input type="radio" class="flat-red" name="divisi" id="SERVER" value="SERVER">
              <label for="SERVER">Server</label>

              <input type="radio" class="flat-red" name="divisi" id="USER" value="USER">
              <label for="USER">User</label>
              </label>
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone number" required>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea name="address" id="address" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label for="avatar">Avatar Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="form-control" id="avatar" name="avatar" required>
                </div>
              </div>
            </div>  
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
              <label for="password_confirmation">Password Confirmantion</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password Confirmation" required>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary" value="Save">Submit</button>
              <a class="btn btn-default float-right" href="{{route('users.index')}}">Cancel</a>
            </div>
        </form>
      </div>
    </div>
  </div>
  @endsection