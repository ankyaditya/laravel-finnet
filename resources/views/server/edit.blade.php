@extends('layouts.global')
@section("title") Edit @endsection
@section("subtitle") Request Server @endsection
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
                    <h3 class="card-title">Server Data</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" action="{{route('server.update', ['id'=>$server->id])}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="os">Operating System</label>
                            <select class="form-control select2" style="width: 100%;" id="os" name="os" required>
                                <option selected="selected">{{$server->os}}</option>
                                <option>Solaris</option>
                                <option>FreeBSD</option>
                                <option>Ubuntu</option>
                                <option>Centos</option>
                                <option>Windwos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ram">RAM</label>
                            <select class="form-control select2" style="width: 100%;" id="ram" name="ram" required>
                                <option selected="selected">{{$server->ram}}</option>
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
                            <select class="form-control select2" style="width: 100%;" id="cpu" name="cpu" required>
                                <option selected="selected">{{$server->cpu}}</option>
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
                                <input value="{{old('disk') ? old('disk'): $server->disk}}" type="number" class="form-control" id="disk" name="disk" required>
                            </div>
                            <small>in GB</small>
                        </div>
                        <div class="form-group">
                            <label for="environtment">Environtment</label>
                            <select class="form-control select2" style="width: 100%;" id="environtment" name="environtment" required>
                                <option selected="selected">{{$server->environtment}}</option>
                                <option>Dev</option>
                                <option>Prod</option>
                                <option>Stagging</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Aplikasi</label>
                            <div class="input-group">
                                <input value="{{old('aplikasi') ? old('aplikasi'): $server->aplikasi}}" type="text" class="form-control" id="aplikasi" name="aplikasi" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" required>{{old('description') ? old('description'): $server->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <br>
                            Current File: <br>
                            @if($server->file)
                            {{asset('storage/'.$server->file)}}
                            <br>
                            @else
                            No File
                            @endif
                            <br>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="file" name="file">
                                </div>
                            </div>
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" value="Simpan">Submit</button>
                            <a class="btn btn-default float-right" href="{{route('server.index')}}">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection