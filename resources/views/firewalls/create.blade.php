@extends('layouts.global')
@section("title") Request @endsection
@section("subtitle") User Firewall @endsection
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
        <form enctype="multipart/form-data" action="{{route('firewalls.store')}}" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="requester_name">Requester Name</label>
              <input type="text" class="form-control" id="requester_name" name="requester_name" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label for="project_name">Project Name</label>
              <select class="form-control" style="width: 100%;" id="project_name" name="project_name">
                <option selected="selected">A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
                <option>E</option>
                <option>F</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name_request">Name Request</label>
              <input type="text" class="form-control" id="name_request" name="name_request" placeholder="Enter Name Request">
            </div>
            <div class="form-group">
              <label for="firewall_address">Firewall Address</label>
              <select class="form-control" style="width: 100%;" id="firewall_address" name="firewall_address">
                <option selected="selected">192.168.1.1</option>
                <option>192.168.1.2</option>
                <option>192.168.1.3</option>
                <option>192.168.1.4</option>
                <option>192.168.1.5</option>
                <option>192.168.1.6</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Roles</label>
              <br>
              <input type="radio" class="flat-red" name="roles" id="ADMIN" value="ADMIN">
              <label for="ADMIN">Administrator</label>

              <input type="radio" class="flat-red" name="roles" id="STAFF" value="STAFF">
              <label for="STAFF">Staff</label>
              </label>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" id="description" class="form-control"></textarea>
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