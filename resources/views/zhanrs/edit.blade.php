@extends('layouts.app')

@section('title', 'Edit Zhanr')

@section('content')

    <div class="row">
        <form action="{{route('zhanr.edit', ['id' => $zhanr->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nazvanie">{{ __('validation.attributes.nazvanie') }}</label>
                <input value="{{ old ('nazvanie', $zhanr->nazvanie) }}" name="nazvanie" type="text"
                       class="form-control @error('nazvanie') is-invalid @enderror">
                @error('nazvanie')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection