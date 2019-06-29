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
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->avatar)
                        <img src="{{asset('storage/'.$user->avatar)}}" width="70px" />
                        @else
                        N/A
                        @endif
                    </td>
                    <td>
                        @if($user->status == "ACTIVE")
                        <span class="badge badge-success">
                            {{$user->status}}
                        </span>
                        @else
                        <span class="badge badge-danger">
                            {{$user->status}}
                        </span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info text-white btn-sm" href="{{route('users.edit', ['id'=>$user->id])}}">Edit</a>
                        <a href="{{route('users.show', ['id' => $user->id])}}" class="btn btn-primary btn-sm">Detail</a>
                        <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('users.destroy', ['id' => $user->id ])}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
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