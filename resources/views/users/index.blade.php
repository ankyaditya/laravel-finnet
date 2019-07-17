@extends('layouts.global')
@section("title") List @endsection
@section("subtitle") User @endsection
@section("content")
<div class="card">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="card-header">
        <h3 class="card-title">Data Users</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                <th><div style="width: 100px;text-align:center">Name</div></th>
                <th><div style="width: 145px;text-align:center">Username</div></th>
                <th><div style="width: 195px;text-align:center">Email</div></th>
                <th><div style="width: 100px;text-align:center">Avatar</div></th>
                <th><div style="width: 100px;text-align:center">Status</div></th>
                <th><div style="width: 220px;text-align:center">Action</div></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td><div style="text-align:center">
                        @if($user->avatar)
                        <img src="{{asset('storage/'.$user->avatar)}}" width="70px" />
                        @else
                        N/A
                        @endif
                        </div>
                    </td>
                    <td style="vertical-align:middle"><div style="text-align:center">
                        @if($user->status == "ACTIVE")
                        <span class="badge badge-success">
                            {{$user->status}}
                        </span>
                        @else
                        <span class="badge badge-danger">
                            {{$user->status}}
                        </span>
                        @endif
                        </div>
                    </td>
                    
                    <td style="vertical-align:middle"><div style="text-align:center">
                        <a class="btn btn-primary text-white btn-ius" href="{{route('users.edit', ['id'=>$user->id])}}"><div class="tooltop"><i class="nav-icon fa  fa-edit" style="float:center"></i>
                        <span class="tooltiptextteng">Edit</span>
                        </div></a>

                        <a class="btn btn-info text-white btn-ius" href="{{route('users.show', ['id'=>$user->id])}}"><div class="tooltop"><i class="nav-icon fa  fa-search" style="float:center"></i>
                        <span class="tooltiptextteng">Detail</span>
                        </div></a>

                        <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('users.destroy', ['id' => $user->id ])}}" method="POST">
                            @csrf
                            <div class="tooltop">

                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-ius" >
                            <i class="nav-icon fa  fa-remove"></i>
                            </button>

                            <span class="tooltiptextteng">Delete</span>
                            </div>
                        </form>
                        
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection