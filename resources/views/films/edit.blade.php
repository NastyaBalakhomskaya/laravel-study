@extends('layouts.app')

@section('title', 'Edit Film')

@section('content')

    <div class="row">
        <form action="{{route('film.edit', ['id' => $film->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">{{ __('validation.attributes.title') }}</label>
                <input value="{{ old ('title', $film->title) }}" name="title" type="text"
                       class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="year">{{ __('validation.attributes.year') }}</label>
                <input value="{{ old ('year', $film->year) }}" name="year" type="text"
                       class="form-control @error('year') is-invalid @enderror">
                @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="text">{{ __('validation.attributes.text') }}</label>
                <textarea name="text" rows="3"
                          class="form-control @error('text') is-invalid @enderror">{{ old('text', $film->text) }}
                </textarea>
                @error('text')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
