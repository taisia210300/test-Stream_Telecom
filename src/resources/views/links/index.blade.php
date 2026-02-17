@extends('layouts.app')

@section('title', 'Сократить ссылку')

@section('content')
    <h1>Сокращатель ссылок</h1>

    <form method="POST" action="{{ route('shorten.store') }}">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="url" style="display: block; margin-bottom: 5px; font-weight: bold;">Введите ссылку для сокращения:</label>
            <input type="url" name="url" id="url" required placeholder="https://example.com/very-long-url" style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>
        <button type="submit" style="padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer;">Сократить</button>
    </form>

    @if (isset($shortUrl))
        <div style="margin-top: 20px; padding: 15px; background: #f0f0f0; border-radius: 5px;">
            <p><strong>Оригинальная ссылка:</strong> <a href="{{ $originalUrl }}" target="_blank">{{ $originalUrl }}</a></p>
            <p><strong>Короткая ссылка:</strong> <a href="{{ $shortUrl }}" target="_blank">{{ $shortUrl }}</a></p>
        </div>
    @endif
@endsection
