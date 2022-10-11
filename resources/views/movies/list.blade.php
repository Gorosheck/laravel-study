@extends('layouts.app')

@section('title-block')Список@endsection

@section('content')
    <h1>Фильмцы</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Номер фильма</th>
            <th scope="col">Название</th>
            <th scope="col">Год</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($movies as $movie)
            <tr>
                <th scope="row">{{ $movie->id }}</th>
                <td>{{ $movie->title_movie }}</td>
                <td>{{ $movie->year }}</td>
                <td>
                    <a href="{{ route('movie.show', ['movie' => $movie->id]) }}">Смотреть</a>
                    <br>
                    @can('edit', $movie)
                    <a href="{{ route('movie.edit.form', ['movie' => $movie->id]) }}">Редактировать</a>
                    @endcan
                    @can('delete', $movie)
                    <form action="{{ route('movie.delete', ['movie' => $movie->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">
                            Удалить
                        </button>
                    </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
