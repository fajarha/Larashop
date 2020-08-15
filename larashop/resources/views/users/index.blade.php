@extends('layouts.global')

@section('title') User List @endsection

@section('content')

    <div class="row mb-1">
        <div class="col-md-6">
            <form action="{{route('users.index')}}">
                <div class="input-group">
                    <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10"
                     type="text" placeholder="Filter Berdasarkan Email"/>

                     <div class="col-md-6">
                     <input {{Request::get('status') == 'ACTIVE' ? 'checked':''}} type="radio" value="ACTIVE"
                     name="status" class="form-control" id="active"/>
                     <label for="active">ACTIVE</label>
                     <input {{Request::get('status') == 'INACTIVE' ? 'checked':''}} type="radio" value="INACTIVE"
                     name="status" class="form-control" id="inactive"/>
                     <label for="inactive">INACTIVE</label>
                     </div>

                     <div class="input-group-append">
                        <input type="submit" value="Filter" class="btn btn-primary">
                     </div>
                </div>
            </form>
        </div>
    </div>
    <hr class="my-3">

    <div class="row">
            <div class="col-md-12 text-right">
            <a
            href="{{route('users.create')}}"
            class="btn btn-primary">Create user</a>
            </div>
    </div>

    <br>
    @if(session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th><b>Name</b></th>
                <th><b>Username</b></th>
                <th><b>Email</b></th>
                <th><b>Avatar</b></th>
                <th><b>Status</b></th>
                <th><b>Action</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                    @if($user->avatar)
                        <img src="{{ asset('storage/'. $user->avatar) }}" width="70px"/>
                    @else
                        N/A
                    @endif
                    </td>
                    <td>
                    @if($user->status == "ACTIVE")
                        <span class="badge badge-success">{{$user->status}}</span>
                    @else
                        <span class="badge badge-danger">{{$user->status}}</span>
                    @endif
                    </td>

                    <form onsubmit="return confirm('Delete this user permanently')" class="dline"
                     action="{{route('users.destroy', [$user->id])}}" method="POST">
                     @csrf
                        <td>
                        <a class="btn btn-info text-white btn-sm" href="{{route('users.edit', [$user->id])}}"> Edit</a>

                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        <a href="{{route('users.show', [$user->id])}}" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                    </form>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
                <tr>
                <td colspan=10>
                {{$users->appends(Request::all())->links()}}
                </td>
                </tr>
        </tfoot>

@endsection
