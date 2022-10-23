@extends('layouts.app')

@section('title-block')Главная@endsection

@section('content')
    <h1>Главная страница</h1>

<div class="row mt-4">
    <div class="col-md-8">
        @if($movies->isEmpty())
            <h2>Films not found</h2>
        @endif

        @foreach($movies as $movie)
            <article class="mb-3">
                <h3 class="mb-1">Название фильма: {{ $movie->title_movie }}</h3>
                <h3 class="mb-1">Год выпуска: {{ $movie->year }}</h3>
                <p class="mb-1"><span><strong>Жанры фильма:</strong></span>
                    @foreach($movie->genres as $genre)
                        <span>{{ $genre->name }},</span>
                    @endforeach
                </p><br>
                @can('edit', $movie)
                    <p><a href="{{ route('movie.edit.form', ['movie' => $movie->id]) }}">Редактировать</a></p>
                @endcan
                <br>
                <hr>
            </article>
        @endforeach
        <div>
            {!! $movies->links() !!}
        </div>
    </div>

    <div class="col-md-4">
        <ul class="list-unstyled d-flex justify-content-start">
            <form action="{{ route('home') }}">
                <div class="input-group">
                    <input class="form-control mb-2" type="text" placeholder="Название" name="name"
                           value="{{ request()->get('name') }}">
                </div>
                <div class="input-group">
                    <input class="form-control mb-2" type="text" placeholder="Год выпуска" name="year"
                           value="{{ request()->get('year') }}">
                </div>
                <label for="genres">{{ __('validation.attributes.genres') }}</label>
                @foreach($genres as $genre)
                    <div class="form-check">
                        <input type="checkbox"
                               name="genres[]"
                               value="{{ $genre->id }}"
                               @if(in_array($genre->id, request()->get('genres', [])))
                               checked
                            @endif
                        > {{ $genre->name }}
                    </div>
                @endforeach

                <label for="actors">{{ __('validation.attributes.actors') }}</label>
                @foreach($actors as $actor)
                    <div class="form-check">
                        <input type="checkbox"
                               name="actors[]"
                               value="{{ $actor->id }}"
                               @if(in_array($actor->id, request()->get('actors', [])))
                               checked
                            @endif
                        > {{ $actor->first_name }} {{ $actor->last_name }}
                    </div>
                @endforeach

                <button class="btn btn-primary">Фильтровать</button>
            </form>
        </ul>
    </div>
</div>
@endsection


