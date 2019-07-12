@extends('layouts.global')
@section("title") Order @endsection
@section("subtitle") Link @endsection
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
                    <h3 class="card-title">Data Order</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" action="{{route('orderlink.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan" placeholder="Enter Nama Perusahaan"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat Data Center</label>
                            <textarea name="address" id="address" class="form-control" placeholder="Enter Alamat" required></textarea>
                            <small>lengkap dengan lantai dan rack</small>
                        </div>
                        <div class="form-group">
                            <label>No. Telepon Referensi</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="number" class="form-control" id="notelpon" name="notelpon" placeholder="Enter No telepon" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama PIC</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="namapic" name="namapic" placeholder="Enter Nama PIC"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No. Telp PIC</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="number" class="form-control" id="nopic" name="nopic" placeholder="Enter No.Telp PIC" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email PIC</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="emailpic" name="emailpic" placeholder="Enter Email PIC"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Provider Link</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="providerlink" name="providerlink" placeholder="Enter Provider Link" required>
                            </div>
                            <small>* Telkom / Lintasarta / Lainnya (tuliskan)</small>
                        </div>
                        <div class="form-group">
                            <label>Jenis Link</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="jenislink" name="jenislink" placeholder="Enter Jenis Link"required>
                            </div>
                            <small>* IPVPN MPLS / METRO-E / SPEEDY/ Lainnya (tuliskan)</small>
                        </div>
                        <div class="form-group">
                            <label for="backhaul">Backhaul</label>
                            <select class="form-control select2" style="width: 100%;" id="backhaul" name="backhaul" required>
                                <option value="">-</option>
                                <option>Epayment (H2H)</option>
                                <option>Finnet (non H2H)</option>
                                <option>Non Backhaul (as client)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bandwidthlink">Bandwidth Link</label>
                            <select class="form-control select2" style="width: 100%;" id="bandwidthlink" name="bandwidthlink" required>
                                <option value="">-</option>
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
                                <option value="">-</option>
                                <option>Telkom</option>
                                <option>Finnet</option>
                                <option>Customer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Delivery Target Date</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                                <input type="date" class="form-control float-right" id="targetdate" name="targetdate" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" value="Save">Submit</button>
                            <a class="btn btn-default float-right" href="{{route('orderlink.index')}}">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @endsection