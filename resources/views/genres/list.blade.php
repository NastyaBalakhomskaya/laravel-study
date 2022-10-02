@extends('layouts.app')

@section('title','Genre list')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title genre</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach($genres as $genre)
            <tr>
                <th scope="row">{{ $genre->id }}</th>
                <td>{{ $genre->title }}</td>
                <td>{{ $genre->created_at?->format('Y/m/d') }}</td>
                <td>
                    <a href="{{ route('genre.show', ['genre' => $genre->id]) }}">Show</a>
                    <br>
                    <a href="{{ route('genre.edit.form', ['genre' => $genre->id]) }}">Edit</a>
                    <br>
                    <form action="{{ route('genre.delete', ['genre' => $genre->id]) }}" method="post">
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
        {{ $genres->links() }}
    </div>
@endsection
