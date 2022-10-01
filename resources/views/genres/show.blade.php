@extends('layouts.app')

@section('title', 'Show genre')

@section('content')
    <h4>Title genre: {{ $genre->title }}</h4>
    <h4>Date add genre in list: {{ $genre->created_at?->format('Y/m/d') }}</h4>
@endsection
