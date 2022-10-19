@extends('layouts.app')

@section('title-block', 'Login history List')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Date login in system</th>
                <th scope="col">Name user</th>
                <th scope="col">IP user</th>
            </tr>
            </thead>
            @foreach($visits as $visit)
                <tr>
                    <td>{{$visit->created_at->format('G:i:s Y/m/d')}}</td>
                    <td>{{$visit->user->name}}</td>
                    <td>{{$visit->user_ip}}</td>
                </tr>
            @endforeach
            <tbody>
            </tbody>
            <div>

@endsection
