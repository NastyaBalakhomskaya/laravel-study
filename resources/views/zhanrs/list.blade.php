@extends('layouts.app')

@section('title','Zhanr list')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nazvanie zhanra</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach($zhanrs as $zhanr)
            <tr>
                <th scope="row">{{ $zhanr->id }}</th>
                <td>{{ $zhanr->nazvanie }}</td>
                <td>{{ $zhanr->created_at?->format('Y/m/d') }}</td>
                <td>
                    <a href="{{ route('zhanr.show', ['id' => $zhanr->id]) }}">Show</a>
                    <br>
                    <a href="{{ route('zhanr.edit.form', ['id' => $zhanr->id]) }}">Edit</a>
                    <br>
                    <form action="{{ route('zhanr.delete', ['id' => $zhanr->id]) }}" method="post">
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
        {{ $zhanrs->links() }}
    </div>
@endsection
