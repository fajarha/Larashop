@extends('layouts.global')

@section('title')
    Create New User
@endsection

@section('content')
<div class="col-md-8">

    @if(session('status'))
        <div class="alert alert-success"> {{ session('status') }}</div>
    @endif

    <h3>Create New User</h3>
    <br>
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{ route('users.store')}}" method="POST">
        @csrf

        <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Full Name" name="name" id="name"/>
        <br>
        <label for="username">Username</label>
            <input type="text" class="form-control" placeholder="Full Name" name="username" id="username"/>
        <br>
        <label for="">Roles</label>
        <br>
            <input type="checkbox" value="ADMIN" name="roles[]" id="ADMIN"/><label for="ADMIN">Administrator</label>
            <input type="checkbox" value="STAFF" name="roles[]" id="STAFF"/><label for="STAFF">STAFF</label>
            <input type="checkbox" value="CUSTOMER" name="roles[]" id="CUSTOMER"/><label for="CUSTOMER">Customer</label>
        <br>
        <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone"/>
        <br>
        <label for="address">Address</label>
            <textarea class="form-control" name="address" id="address"> </textarea>
        <br>
        <label for="avatar">Avatar</label>
            <input type="file" class="form-control" name="avatar" id="avatar"/>

        <hr class="my-3">

        <label for="email">E-Mail</label>
            <input type="text" class="form-control" placeholder="User@mail.com" name="email" id="email"/>
        <br>
        <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="password" name="password" id="password"/>
        <br>
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" class="form-control" placeholder="password confirmation" name="password_confimation" id="password_confirmation"/>
        <br>
        <input type="submit" class="btn btn-primary" value="Save"/>
    </form>

</div>
@endsection
