@extends('layouts.app')

@section('title-block')Фильм@endsection

@section('content')

    <h3>{{ $movie->title_movie }}</h3>
    <h4>{{ $movie->year }}</h4>
    <p>{!! nl2br(strip_tags($movie->description)) !!}</p>

@endsection
