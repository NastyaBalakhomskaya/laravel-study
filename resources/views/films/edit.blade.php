@extends('layouts.app')

@section('title', 'Edit Film')

@section('content')

    <div class="row">
        <form action="{{route('film.edit', ['film' => $film->id]) }}" method="post">
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
                <label for="">Actors</label>
                @error('actors')
                <div>{{ $message }}</div>
                @enderror
                @foreach($actors as $actor)
                    <div class="form-check">
                        <input type="checkbox" name="actors[]" value="{{ $actor->id }}" class="form-check-input"
                               @if($film->actors->contains('id', $actor->id)) checked @endif
                        > {{ $actor->last_name }}
                    </div>
                @endforeach
            </div>
            <br>
            <div class="form-group">
                <label for="">Genres</label>
                @error('genres')
                <div>{{ $message }}</div>
                @enderror
                @foreach($genres as $genre)
                    <div class="form-check">
                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                               class="form-check-input"
                               @if($film->genres->contains('id', $genre->id)) checked @endif
                        > {{ $genre->title }}
                    </div>
                @endforeach
            </div>
            <br>
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
