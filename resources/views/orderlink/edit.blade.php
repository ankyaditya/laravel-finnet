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
                    <h3 class="card-title">Edit Data</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" action="{{route('orderlink.update', ['id'=>$orderlink->id])}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">
                    <div class="card-body">
                    <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input value="{{old('namaperusahaan') ? old('namaperusahaan'): $orderlink->namaperusahaan}}" type="text" class="form-control" id="namaperusahaan" name="namaperusahaan" placeholder="Enter Nama Perusahaan"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat Data Center</label>
                            <textarea name="address" id="address" class="form-control" placeholder="Enter Alamat" required>{{old('address') ? old('address'): $orderlink->address}}</textarea>
                            <small>lengkap dengan lantai dan rack</small>
                        </div>
                        <div class="form-group">
                            <label>No. Telepon Referensi</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input value="{{old('notelpon') ? old('notelpon'): $orderlink->notelpon}}" type="number" class="form-control" id="notelpon" name="notelpon" placeholder="Enter No telepon" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama PIC</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input value="{{old('namapic') ? old('namapic'): $orderlink->namapic}}" type="text" class="form-control" id="namapic" name="namapic" placeholder="Enter Nama PIC"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No. Telp PIC</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input value="{{old('nopic') ? old('nopic'): $orderlink->nopic}}" type="number" class="form-control" id="nopic" name="nopic" placeholder="Enter No.Telp PIC" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email PIC</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input value="{{old('emailpic') ? old('emailpic'): $orderlink->emailpic}}" type="text" class="form-control" id="emailpic" name="emailpic" placeholder="Enter Email PIC"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Provider Link</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input value="{{old('providerlink') ? old('providerlink'): $orderlink->providerlink}}" type="text" class="form-control" id="providerlink" name="providerlink" placeholder="Enter Provider Link" required>
                            </div>
                            <small>* Telkom / Lintasarta / Lainnya (tuliskan)</small>
                        </div>
                        <div class="form-group">
                            <label>Jenis Link</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input value="{{old('jenislink') ? old('jenislink'): $orderlink->jenislink}}" type="text" class="form-control" id="jenislink" name="jenislink" placeholder="Enter Jenis Link"required>
                            </div>
                            <small>* IPVPN MPLS / METRO-E / SPEEDY/ Lainnya (tuliskan)</small>
                        </div>
                        <div class="form-group">
                            <label for="backhaul">Backhaul</label>
                            <select class="form-control select2" style="width: 100%;" id="backhaul" name="backhaul" required>
                                <option selected="selected">{{$orderlink->backhaul}}</option>
                                <option>Epayment (H2H)</option>
                                <option>Finnet (non H2H)</option>
                                <option>Non Backhaul (as client)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bandwidthlink">Bandwidth Link</label>
                            <select class="form-control select2" style="width: 100%;" id="bandwidthlink" name="bandwidthlink" required>
                                <option selected="selected">{{$orderlink->bandwidthlink}}</option>
                                <option>128</option>
                                <option>256</option>
                                <option>512</option>
                                <option>1024</option>
                            </select>
                            <small>in Kbps</small>
                        </div>
                        <div class="form-group">
                            <label for="ikg">Beban Instalasi Kabel Gedung</label>
                            <select class="form-control select2" style="width: 100%;" id="ikg" name="ikg" required>
                                <option selected="selected">{{$orderlink->ikg}}</option>
                                <option>Telkom</option>
                                <option>Finnet</option>
                                <option>Customer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Delivery Target Date</label><br>
                            Current Date : {{$orderlink->targetdate}}
                            <br>
                            <br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                                <input type="date" class="form-control float-right" id="targetdate" name="targetdate">
                            </div>
                            <small>Kosongkan jika tidak ingin mengganti target date</small>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" value="Simpan">Submit</button>
                            <a class="btn btn-default float-right" href="{{route('orderlink.index')}}">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection