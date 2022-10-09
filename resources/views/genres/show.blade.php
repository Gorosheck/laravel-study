@extends('layouts.app')

@section('title-block')Жанр@endsection

@section('content')

    <h4>Номер жанра: {{ $genre->id }}</h4>
    <h3>Название жанра: {{ $genre->name }}</h3>

@endsection
