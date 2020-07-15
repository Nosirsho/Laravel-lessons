@extends('layouts.app')
@section('title-block')Обновление записи@endsection
@section('content')
    <h1>Обновление записи</h1>



    <form action="{{ route('contact-update-submit', $data->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Введите имя</label>
            <input type="text" name="name" placeholder="Введите имя" value="{{ $data->name }}" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Введите email" value="{{ $data->email }}" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="subject">Тема сообщения</label>
            <input type="text" name="subject" placeholder="Тема сообщения" value="{{ $data->subject }}" id="subject" class="form-control">
        </div>
        <div class="form-group">
            <label for="message">Сообщение</label>
            <textarea name="message" id="message" class="form-control"  placeholder="Введите сообщение...">{{ $data->message }}</textarea>

            <button type="submit" class="btn btn-success mt-2">Обновить</button>
        </div>
    </form>

@endsection
