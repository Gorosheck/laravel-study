@extends('layouts.app')

@section('title-block')Актер@endsection

@section('content')

    <h4>Номер актера: {{ $actor->id }}</h4>
    <h3>Имя актера: {{ $actor->name }}</h3>

@endsection
