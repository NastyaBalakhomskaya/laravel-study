@extends('layouts.app')

@section('title-block')Главная страница@endsection

@section('content')

    <div class="row mt-4">
        <div class="col-md-8">

            @if($films->isEmpty())
                <h2>Films not found</h2>
            @endif

            @foreach($films as $film)
                <article class="mb-3">
                    <h2 class="mb-1">Title film: {{ $film->title }}</h2>
                    <h4 class="mb-1">Year film: {{ $film->year }}</h4>
                    <h4>Genres film: </h4>
                    <p class="mb-1">
                        @foreach($film->genres as $genre)
                            <span>{{ $genre->title }}</span>
                        @endforeach
                    </p>
                    <h4>Actors film: </h4>
                    <p class="mb-1">
                        @foreach($film->actors as $actor)
                            <span>{{ $actor->last_name }}</span>
                        @endforeach
                    </p>


                </article>
            @endforeach
            <div class="flex.justify-content-center">
                {!! $films->links() !!}
            </div>
        </div>
        <div class="col-md-4">
            <ul class="list-unstyled">


                <form action="{{ route('home') }}">
                    <h4>Parametrs search film: </h4>

                    <h6>Title film: </h6>
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Title" name="title"
                               value="{{ request()->get('title') }}">
                    </div>
                    <br>

                    <h6>Year film: </h6>
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Year" name="year"
                               value="{{ request()->get('year') }}">
                    </div>
                    <br>
                    <div style="border:1px solid #ccc;">
                        <table border="0" width="100%">
                            <tr>
                                <th>Genres film:</th>
                                <th>Actors film:</th>
                            </tr>

                            <td>
                                @foreach($genres as $genre)
                                    <div class="form-check">
                                        <input type="checkbox"
                                               name="genres[]"
                                               value="{{ $genre->id }}"
                                               @if(in_array($genre->id, request()->get('genres',[])))
                                               checked
                                            @endif
                                        > {{$genre->title}}
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @foreach($actors as $actor)
                                    <div class="form-check">
                                        <input type="checkbox"
                                               name="genres[]"
                                               value="{{ $actor->id }}"
                                               @if(in_array($actor->id, request()->get('actors',[])))
                                               checked
                                            @endif
                                        > {{$actor->last_name}}
                                    </div>
                                @endforeach
                            </td>
                        </table>
                    </div>
                    <br>
                    <button class="btn btn-primary">Search</button>
                </form>
            </ul>
        </div>
    </div>

@endsection


