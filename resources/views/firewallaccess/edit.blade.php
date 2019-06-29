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
                    <h3 class="card-title">User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" action="{{route('firewallaccess.update', ['id'=>$firewallaccesss->id])}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <select class="form-control" style="width: 100%;" id="project_name" name="project_name">
                                <option selected="selected">{{$firewallaccesss->project_name}}</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                                <option>F</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Source</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input value="{{old('source') ? old('source'): $firewallaccesss->source}}" type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="source" name="source">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Destination</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input value="{{old('destination') ? old('destination'): $firewallaccesss->destination}}" type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="destination" name="destination">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Port</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input value="{{old('port') ? old('port'): $firewallaccesss->port}}" type="number" class="form-control" id="port" name="port">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control">{{old('description') ? old('description'): $firewallaccesss->description}}</textarea>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" value="Simpan">Submit</button>
                            <button type="submit" class="btn btn-default float-right">Cancel</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection