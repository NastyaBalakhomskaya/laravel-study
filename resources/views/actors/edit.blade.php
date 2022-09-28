@extends('layouts.app')

@section('title', 'Edit Actor')

@section('content')

    <div class="row">
        <form action="{{route('actor.edit', ['id' => $actor->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="last_name">{{ __('validation.attributes.last_name') }}</label>
                <input value="{{ old ('last_name', $actor->last_name) }}" name="last_name" type="text"
                       class="form-control @error('last_name') is-invalid @enderror">
                @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="first_name">{{ __('validation.attributes.first_name') }}</label>
                <input value="{{ old ('first_name', $actor->first_name) }}" name="first_name" type="text"
                       class="form-control @error('first_name') is-invalid @enderror">
                @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="otchestvo">{{ __('validation.attributes.otchestvo') }}</label>
                <input value="{{ old ('otchestvo', $actor->otchestvo) }}" name="otchestvo" type="text"
                       class="form-control @error('otchestvo') is-invalid @enderror">
                @error('otchestvo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_rozh">{{ __('validation.attributes.date_rozh') }}</label>
                <input value="{{ old ('date_rozh', $actor->date_rozh) }}" name="date_rozh" type="date"
                       class="form-control @error('date_rozh') is-invalid @enderror">
                @error('date_rozh')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="height">{{ __('validation.attributes.height') }}</label>
                <input value="{{ old ('height', $actor->height) }}" name="height" type="text"
                       class="form-control @error('height') is-invalid @enderror">
                @error('height')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
