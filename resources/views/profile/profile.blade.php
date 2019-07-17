@extends('layouts.global')
@section("title") Profile @endsection
@section("subtitle") Page @endsection
@section("content")
<div class="container-fluid">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="card card-info">

        <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="{{asset('storage/'.Auth::user()->avatar)}}" style="width:245px; height:245px; " alt="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5>
                                {{Auth::user()->name}} </h5>
                            <h6>
                                {{Auth::user()->roles}}
                            </h6>
                            <p class="proile-rating">Since : <span> {{Auth::user()->created_at}}</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a class="profile-edit-btn" name="btnAddMore" id="edit" href="{{route('home.edit')}}" style="  text-decoration: none;">Edit Profile</a>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $("#edit").hover(function() {
                                    var r = Math.floor(Math.random() * 255);
                                    var g = Math.floor(Math.random() * 255);
                                    var b = Math.floor(Math.random() * 255);
                                    var color = 'rgb(' + r + ',' + g + ',' + b + ')';
                                    $(this).css("background-color", color);
                                })

                            });
                        </script>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row" style="margin-top:-60px">
                                    <div class="col-md-6">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->username}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->email}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->phone}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Roles</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->roles}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row" style="margin-top:-60px">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div style="text-align:center">No</div>
                                                </th>
                                                <th>
                                                    <div style="text-align:center">Request id</div>
                                                </th>
                                                <th>
                                                    <div style="text-align:center">Role</div>
                                                </th>
                                                <th>
                                                    <div style="text-align:center">Description</div>
                                                </th>
                                                <th>
                                                    <div style="text-align:center">Date</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user as $usr)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$usr->unique_request}}</td>
                                                <td>{{$usr->role}}</td>
                                                <td>{{$usr->description}}</td>
                                                <td>{{$usr->date}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Your Bio</label><br />
                                    <p>Your detail description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

@endsection