
@extends('layouts.app')

@section('content')
        <div id="app">
            @foreach($users as $user)

                <div class="name">
                    {{$user->name}}<br>
                    {{$user->role}}<br>
                    {{$user->id}}<br>
                    {{$user->created_at}}<br>
                    {{$user->updated_at}}<br>
                </div>
                <hr>

            @endforeach
        </div>
@endsection