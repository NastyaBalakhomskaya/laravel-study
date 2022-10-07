@extends('layouts.app')

@section('title','Actor list')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Last name</th>
            <th scope="col">First name</th>
            <th scope="col">Patronymic</th>
            <th scope="col">Birthday</th>
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
                <td>{{ $actor->patronymic }}</td>
                <td>{{ $actor->birthday }}</td>
                <td>{{ $actor->height }}</td>
                <td>{{ $actor->created_at?->format('Y/m/d') }}</td>
                <td>
                    @can('show', $actor)
                        <a href="{{ route('actor.show', ['actor' => $actor->id]) }}">Show</a>
                    @endcan
                    <br>
                    @can('edit', $actor)
                        <a href="{{ route('actor.edit.form', ['actor' => $actor->id]) }}">Edit</a>
                    @endcan
                    <br>
                    @can('delete', $actor)
                        <form action="{{ route('actor.delete', ['actor' => $actor->id]) }}" method="post">
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
        {{ $actors->links() }}
    </div>
@endsection
