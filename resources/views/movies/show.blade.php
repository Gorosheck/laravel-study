@extends('layouts.app')

@section('title-block')Фильм@endsection

@section('content')

    <h3>Название фильма: {{ $movie->title_movie }}</h3>
    <h4>Год выпуска: {{ $movie->year }}</h4>
    <p class="mb-1">Жанр:
        @foreach($movie->genres as $genre)
            <span>{{ $genre->name }}</span>
        @endforeach
    </p>
    <p class="mb-1">Актёры:
        @foreach($movie->actors as $actor)
            <span>{{ $actor->first_name }} {{ $actor->last_name }}</span>
        @endforeach
    </p>
    <p class="mb-1">Добавиль пользователь {{ $movie->user->name }} с ID: {{ $movie->user->id }}</p>
    <p>{!! nl2br(strip_tags($movie->description)) !!}</p>

@endsection
