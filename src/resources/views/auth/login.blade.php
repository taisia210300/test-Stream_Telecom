@extends('layouts.app')

@section('title', 'Вход')

@section('content')
    <h1>Вход</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; margin-bottom: 5px;">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; margin-bottom: 5px;">Пароль:</label>
            <input type="password" name="password" id="password" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>
                <input type="checkbox" name="remember"> Запомнить меня
            </label>
        </div>
        <button type="submit" style="padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer;">Войти</button>
    </form>

    <p style="margin-top: 20px;">Нет аккаунта? <a href="{{ route('register') }}">Зарегистрируйтесь</a></p>
@endsection
