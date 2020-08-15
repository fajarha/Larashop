@extends('layouts.global')

@section('title') User Edit @endsection

@section('content')

<div class="col-md-8">

        @if(session('status'))
            <div class="alert alert-success"> {{ session('status') }}</div>
        @endif

        <h3>Edit User</h3>
        <br>
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{ route('users.update', [$user->id])}}" method="POST">
            @csrf

            <input type="hidden" value="PUT" name="_method">

            <label for="name">Name</label>
                <input type="text" class="form-control" value="{{$user->name}}" name="name" id="name"/>
            <br>
            <label for="username">Username</label>
                <input type="text" class="form-control" value="{{$user->username}}" name="username" id="username"/>
            <br>
            <label for="">Status</label>
            <br>
                <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-control" id="active" name="status">
                <label for="active"> Active</label>
                <input {{$user->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-control" id="inactive" name="status">
                <label for="inactive"> Inactive</label>
            <br>
                <input type="checkbox" {{in_array("ADMIN", json_decode($user->roles)) ?"checked" : ""}}
                value="ADMIN" name="roles[]" id="ADMIN"/><label for="ADMIN">Administrator</label>
                <input type="checkbox" {{in_array("STAFF", json_decode($user->roles)) ?"checked" : ""}}
                value="STAFF" name="roles[]" id="STAFF"/><label for="STAFF">STAFF</label>
                <input type="checkbox" {{in_array("CUSTOMER", json_decode($user->roles)) ?"checked" : ""}}
                value="CUSTOMER" name="roles[]" id="CUSTOMER"/><label for="CUSTOMER">Customer</label>
            <br>
            <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{$user->phone}}"/>
            <br>
            <label for="address">Address</label>
                <textarea class="form-control" name="address" id="address">{{$user->address}}</textarea>
            <br>
            <label for="avatar">Avatar</label>
            <br>
            Current Avatar
            <br>
                @if ($user->avatar)
                    <img src="{{asset('storage/'.$user->avatar)}}" width="120px" />
                    <br>
                @else
                    No Avatar
                @endif
                <br>
                <input type="file" class="form-control" name="avatar" id="avatar"/>
                <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
            <hr class="my-3">

            <label for="email">E-Mail</label>
                 <input type="text" class="form-control" value="{{$user->email}}" name="email" id="email"/>

            <br>
            <input type="submit" class="btn btn-primary" value="Save"/>
        </form>

    </div>

@endsection
