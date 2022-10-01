@extends('layouts.app')

@section('title', 'Show actor')

@section('content')
    <h4>Last name actor: {{ $actor->last_name }}</h4>
    <h4>First name actor: {{ $actor->first_name }}</h4>
    <h4>Patronymic actor: {{ $actor->patronymic }}</h4>
    <h4>Birthday actor: {{ $actor->birthday }}</h4>
    <h4>Height actor: {{ $actor->height }}</h4>
    <h4>Date add actor in list: {{ $actor->created_at?->format('Y/m/d') }}</h4>
@endsection
