@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <h1>Регистрация</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px;">Имя:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; margin-bottom: 5px;">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; margin-bottom: 5px;">Пароль (минимум 8 символов):</label>
            <input type="password" name="password" id="password" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password_confirmation" style="display: block; margin-bottom: 5px;">Подтверждение пароля:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required style="width: 100%; padding: 8px;">
        </div>
        <button type="submit" style="padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer;">Зарегистрироваться</button>
    </form>

    <p style="margin-top: 20px;">Уже есть аккаунт? <a href="{{ route('login') }}">Войдите</a></p>
@endsection
