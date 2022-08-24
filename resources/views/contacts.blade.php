@extends('layouts.app')

@section('title-block')Контакты@endsection

@section('content')
<h1>Контакты</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cum eaque eligendi eveniet facilis hic ipsam quae similique. Adipisci aperiam aut cumque doloremque eaque explicabo incidunt omnis perferendis vel vero.</p>


    <h2>Форма обратной связи</h2>

    <form>
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text" id="inputGroup-sizing-lg">E-mail</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text" id="inputGroup-sizing-lg">Tel</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
