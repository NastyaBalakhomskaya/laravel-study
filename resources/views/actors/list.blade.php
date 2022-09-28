@extends('layouts.app')

@section('title','Actor list')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Last name</th>
            <th scope="col">First name</th>
            <th scope="col">Otchestvo</th>
            <th scope="col">Date rozhdenia</th>
            <th scope="col">Height</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($actors as $actor)
            <tr>
                <th scope="row">{{ $actor->id }}</th>
                <td>{{ $actor->last_name }}</td>
                <td>{{ $actor->first_name }}</td>
                <td>{{ $actor->otchestvo }}</td>
                <td>{{ $actor->date_rozh }}</td>
                <td>{{ $actor->height }}</td>
                <td>{{ $actor->created_at?->format('Y/m/d') }}</td>
                <td>
                    <a href="{{ route('actor.show', ['id' => $actor->id]) }}">Show</a>
                    <br>
                    <a href="{{ route('actor.edit.form', ['id' => $actor->id]) }}">Edit</a>
                    <br>
                    <form action="{{ route('actor.delete', ['id' => $actor->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $actors->links() }}
    </div>
@endsection
