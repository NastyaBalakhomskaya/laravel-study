@extends('layouts.app')

@section('title', 'Edit Actor')

@section('content')

    <div class="row">
        <form action="{{route('actor.edit', ['actor' => $actor->id]) }}" method="post">
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
                <label for="patronymic">{{ __('validation.attributes.patronymic') }}</label>
                <input value="{{ old ('patronymic', $actor->patronymic) }}" name="patronymic" type="text"
                       class="form-control @error('patronymic') is-invalid @enderror">
                @error('patronymic')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="birthday">{{ __('validation.attributes.birthday') }}</label>
                <input value="{{ old ('birthday', $actor->birthday) }}" name="birthday" type="date"
                       class="form-control @error('birthday') is-invalid @enderror">
                @error('birthday')
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
