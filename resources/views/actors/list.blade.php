@extends('layouts.app')

@section('title-block')Список актеров@endsection

@section('content')
    <h1>Актеры</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Номер актера</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Отчество</th>
            <th scope="col">ДР</th>
            <th scope="col">Рост</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($actors as $actor)
            <tr>
                <th scope="row">{{ $actor->id }}</th>
                <td>{{ $actor->firstname }}</td>
                <td>{{ $actor->lastname }}</td>
                <td>{{ $actor->patronymic }}</td>
                <td>{{ $actor->birthday }}</td>
                <td>{{ $actor->height }}</td>
                <td>
                    <a href="{{ route('actors.show', ['actor' => $actor->id]) }}">Смотреть</a>
                    <br>
                    @can('edit', $actor)
                    <a href="{{ route('actors.edit', ['actor' => $actor->id]) }}">Редактировать</a>
                    @endcan
                    @can('delete', $actor)
                    <form action="{{ route('actors.delete', ['actor' => $actor->id]) }}" method="post">
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
