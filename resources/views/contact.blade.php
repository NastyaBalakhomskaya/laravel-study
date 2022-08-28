@extends('layouts.app')

@section('title-block')Обратная связь@endsection

@section('content')
<h1>Обратная связь</h1>
    <form action="/contact/submit" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Введите имя </label>
            <input type="text" name="name" placeholder="Введите имя" id="name" class="form=control">
        </div>
        <br>
        <div class="form-group">
            <label for="email">Введите email </label>
            <input type="text" name="email" placeholder="Введите email" id="email" class="form=control">
        </div>
        <br>
        <div class="form-group">
            <label for="phone">Введите телефон</label>
            <input type="text" name="phone" placeholder="Введите телефон" id="phone" class="form=control">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Отправить</button>


    </form>

@endsection
