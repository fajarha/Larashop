@extends('layouts.global')

@section('title') Detail User @endsection

@section('content')

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <b>Name:</b>
                <br/>
                {{$user->name}}
                <br>
                <br>

                @if ($user->avatar)
                    <img src="{{asset('storage/'.$user->avatar)}}" width="128px"/>
                @else
                    No Avatar
                @endif

                <br>
                <br>
                <b>Username:</b>
                <br>
                {{$user->username}}

                <br>
                <br>
                <b>Email:</b>
                <br>
                {{$user->email}}

                <br>
                <br>
                <b>Username:</b>
                <br>
                {{$user->email}}

                <br>
                <br>
                <b>Roles:</b>
                <br>
                @foreach (json_decode($user) as $role)
                    &middot; {{$role}}
                    <br>
                @endforeach
            </div>
        </div>
    </div>

@endsection
