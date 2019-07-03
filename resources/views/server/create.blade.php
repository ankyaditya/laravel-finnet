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
                <form enctype="multipart/form-data" action="{{route('server.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="os">Operating System</label>
                            <select class="form-control select2" style="width: 100%;" id="os" name="os">
                                <option>-</option>
                                <option>Solaris</option>
                                <option>FreeBSD</option>
                                <option>Ubuntu</option>
                                <option>Centos</option>
                                <option>Windwos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ram">RAM</label>
                            <select class="form-control select2" style="width: 100%;" id="ram" name="ram">
                                <option>-</option>
                                <option>2</option>
                                <option>4</option>
                                <option>8</option>
                                <option>16</option>
                                <option>32</option>
                                <option>64</option>
                            </select>
                            <small>in GB</small>
                        </div>
                        <div class="form-group">
                            <label for="cpu">CPU</label>
                            <select class="form-control select2" style="width: 100%;" id="cpu" name="cpu">
                                <option>-</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>disk</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="disk" name="disk">
                            </div>
                            <small>in GB</small>
                        </div>
                        <div class="form-group">
                            <label for="environtment">Environtment</label>
                            <select class="form-control select2" style="width: 100%;" id="environtment" name="environtment">
                                <option>-</option>
                                <option>Dev</option>
                                <option>Prod</option>
                                <option>Stagging</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Aplikasi</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="aplikasi" name="aplikasi">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="file" name="file">
                                </div>
                            </div>
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