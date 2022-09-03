@extends('layouts.app')

@section('title-block')Контакты@endsection

@section('content')
<h1>Контакты</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cum eaque eligendi eveniet facilis hic ipsam quae similique. Adipisci aperiam aut cumque doloremque eaque explicabo incidunt omnis perferendis vel vero.</p>


    <h2>Форма обратной связи</h2>
@if ($errors->any())
    <div class="alert alert-danger">Error!</div>
@endif
    <form action="{{ route('report_store') }}" method="post">
        @csrf
        <div class="form-group w-50">
            <label for="name">{{ __('validation.attributes.name') }}</label>
            <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group w-50">
            <label for="email">{{ __('validation.attributes.email') }}</label>
            <input value="{{ old('email') }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group w-50">
            <label for="tel">{{ __('validation.attributes.tel') }}</label>
            <input value="{{ old('tel') }}" name="tel" type="tel" class="form-control @error('tel') is-invalid @enderror">
            @error('tel')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

