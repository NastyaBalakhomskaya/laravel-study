@extends('layouts.app')

@section('title', 'Show actor')

@section('content')
    <h4>Last name actor: {{ $actor->last_name }}</h4>
    <h4>First name actor: {{ $actor->first_name }}</h4>
    <h4>Otchectvo actor: {{ $actor->otchestvo }}</h4>
    <h4>Date rozhdenia actor: {{ $actor->date_rozh }}</h4>
    <h4>Height actor: {{ $actor->height }}</h4>
    <h4>Date add actor in list: {{ $actor->created_at?->format('Y/m/d') }}</h4>
@endsection
