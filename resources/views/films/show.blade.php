@extends('layouts.app')

@section('title', 'Show film')

@section('content')
    <h4>Title film: {{ $film->title }}</h4>
    <h4>Year create film: {{ $film->year }}</h4>
    <h4>User add film: {{ $film->user->name }}</h4>
    <h4>Data add film in list: {{ $film->created_at?->format('Y/m/d') }}</h4>
    <br>
    <h4>Genre film: </h4>
    @foreach($film->genres as $genre)
        <h5>{{$genre->title}}</h5>
    @endforeach
    <br>
    <h4>Actors film: </h4>
    @foreach($film->actors as $actor)
        <h5>{{ $actor->last_name }} {{ $actor->first_name }}</h5>
    @endforeach
    <br>
    <h4>Description film: </h4>
    <p>{!! nl2br(strip_tags($film->text)) !!}</p>
@endsection
