@extends('layouts.app')

@section('title-block')Создание жанра@endsection

@section('content')

    <div class="row w-50 d-flex">
        <form action="{{ route('genres.create') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">{{__('validation.attributes.name') }}</label>
                <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Добавить</button>
        </form>
    </div>

@endsection
