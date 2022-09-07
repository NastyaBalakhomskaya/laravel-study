@extends('layouts.app')

@section('title', 'Show film')

@section('content')
    <h3>{{ $film->title }}</h3>
    <h3>{{ $film->year }}</h3>
    <h4>{{ $film->created_at?->format('Y/m/d') }}</h4>
    <p>{!! nl2br(strip_tags($film->text)) !!}</p>

@endsection
