<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>@yield('title-block')</title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active" aria-current="page">Главная</a></li>
            <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">О компании</a></li>
            <li class="nav-item"><a href="{{ route('contacts') }}" class="nav-link">Контакты</a></li>
            <li class="nav-item"><a href="{{ route('sign-up.form') }}" class="nav-link">Регистрация</a></li>
            <li class="nav-item"><a class="nav-link"  href="{{  route('login') }}">Войти</a></li>

            @if (auth()->check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Фильмы
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('movie.list') }}">Список фильмов</a></li>
                        @can('create', \App\Models\Movie::class)
                        <li><a class="dropdown-item" href="{{ route('movie.create') }}">Добавить фильм</a></li>
                        @endcan
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Жанры
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('genres.list') }}">Список жанров</a></li>
                        @can('create', \App\Models\Genre::class)
                        <li><a class="dropdown-item" href="{{ route('genres.create.genre') }}">Добавить жанр</a></li>
                        @endcan
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Актеры
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('actors.list') }}">Список актеров</a></li>
                        @can('create', \App\Models\Actor::class)
                        <li><a class="dropdown-item" href="{{ route('actors.create.actor') }}">Добавить актера</a></li>
                        @endcan
                    </ul>
                </li>
            @endif

            @if (auth()->check())
                <form action="{{ route('logout') }}" method="post" class="form-inline">
                    @csrf
                    <button class="btn btn-danger">Выйти</button>
                </form>
            @endif

        </ul>
    </header>
</div>
@include('flash-messages')
@yield('content')

</body>
</html>
