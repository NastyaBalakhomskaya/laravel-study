@extends('layouts.app')

@section('title', 'Show zhanr')

@section('content')
    <h4>Nazvanie zhanr: {{ $zhanr->nazvanie }}</h4>
    <h4>Date add zhanr in list: {{ $zhanr->created_at?->format('Y/m/d') }}</h4>
@endsection
