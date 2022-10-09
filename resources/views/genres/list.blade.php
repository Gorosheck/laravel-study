@extends('layouts.app')

@section('title-block')Список жанров@endsection

@section('content')
    <h1>Жанры</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Номер жанра</th>
            <th scope="col">Название</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($genres as $genre)
            <tr>
                <th scope="row">{{ $genre->id }}</th>
                <td>{{ $genre->name }}</td>
                <td>
                    <a href="{{ route('genres.show', ['genre' => $genre->id]) }}">Смотреть</a>
                    <br>
                    <a href="{{ route('genres.edit', ['genre' => $genre->id]) }}">Редактировать</a>
                    <form action="{{ route('genres.delete', ['genre' => $genre->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
