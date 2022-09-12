@extends('layouts.app')

@section('title-block')Редактирование@endsection

@section('content')

    <div class="row w-50 d-flex">
        <form action="{{ route('movie.edit', ['movie' => $movie->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title_movie">{{__('validation.attributes.title_movie') }}</label>
                <input value="{{ old('title_movie', $movie->title_movie) }}" name="title_movie" type="text" class="form-control @error('title_movie') is-invalid @enderror">
                @error('title_movie')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="year">{{__('validation.attributes.year') }}</label>
                <input value="{{ old('year', $movie->year) }}" name="year" type="text" class="form-control @error('year') is-invalid @enderror">
                @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">{{__('validation.attributes.description') }}</label>
                <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $movie->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
        </form>
    </div>

@endsection
