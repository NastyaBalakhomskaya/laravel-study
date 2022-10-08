@extends('layouts.app')

@section('title','Film list')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Created At</th>
            <th scope="col">User add name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($films as $film)
            <tr>
                <th scope="row">{{ $film->id }}</th>
                <td>{{ $film->title }}</td>
                <td>{{ $film->created_at?->format('Y/m/d') }}</td>
                <td>{{ $film->user->name }}</td>
                <td></td>
                <td>
                    <a href="{{ route('film.show', ['film' => $film->id]) }}">Show</a>
                    <br>
                    @can('edit', $film)
                        <a href="{{ route('film.edit.form', ['film' => $film->id]) }}">Edit</a>
                    @endcan
                    <br>
                    @can('delete', $film)
                        <form action="{{ route('film.delete', ['film' => $film->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $films->links() }}
    </div>
@endsection
