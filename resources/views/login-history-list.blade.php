@extends('layouts.app')

@section('title-block')Список@endsection

@section('content')
    <h1>История входов</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID пользователя</th>
            <th scope="col">Время входа</th>
            <th scope="col">IP пользователя</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logins as $login)
            <tr>
                <th scope="col">{{ $login->user_id }}</th>
                <th scope="col">{{ $login->created_at }}</th>
                <th scope="col">{{ $login->ip }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
