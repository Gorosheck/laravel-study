@extends('layouts.app')

@section('title-block')Редактирование@endsection

@section('content')

    <div class="row w-50 d-flex">
        <form action="{{ route('genres.edit', ['genre' => $genre->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">{{__('validation.attributes.name') }}</label>
                <input value="{{ old('name', $genre->name) }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Редактировать</button>
        </form>
    </div>

@endsection
