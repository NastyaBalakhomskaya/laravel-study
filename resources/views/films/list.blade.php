@extends('layouts.app')

@section('title','Film list')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach($films as $film)
            <tr>
                btn-success
                <th scope="row">{{ $film->id }}</th>
                <td>{{ $film->title }}</td>
                <td>{{ $film->created_at?->format('Y/m/d') }}</td>
                <td>
                    <a href="{{ route('film.show', ['id' => $film->id]) }}">Show</a>
                    <br>
                    <a href="{{ route('film.edit.form', ['id' => $film->id]) }}">Edit</a>
                    <br>
                    <form action="{{ route('film.delete', ['id' => $film->id]) }}" method="post">
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
        {{ $films->links() }}
    </div>
@endsection