<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ @asset('/fontawesome/css/all.min.css') }}">
</head>
<body>
<div id="site">
    <header class="header">
        <div class="container">
            <div class="logo">
                <h1>Знаменский сельсовет</h1>
            </div>
            <nav class="nav">
                <a href="/">Главная</a>
                <a href="{{ route('history') }}">История</a>
                <a href="{{ route('deputies') }}">Совет</a>
                <div class="dropdown">
                    <a href="{{ route('documents') }}">Документы ▾</a>
                    <div class="dropdown-content">
                        @forelse(App\Models\DocumentType::all() as $type)
                            <a href="{{ route('documents.type', $type) }}"
                               class="dropdown-item {{ $loop->first ? 'first' : '' }} {{ $loop->last ? 'last' : '' }}"
                               data-type-id="{{ $type->id }}">
                                <span class="document-type-icon">📄</span>
                                <span class="document-type-title">{{ $type->title }}</span>
                                @if($type->documents_count)
                                    <span class="document-count">({{ $type->documents_count }})</span>
                                @endif
                            </a>
                        @empty
                            <div class="dropdown-empty">
                                Нет доступных категорий документов
                            </div>
                        @endforelse
                    </div>
                </div>
                {{--            <a href="{{ route('administration') }}">Администрация</a>--}}
                <a href="{{ route('news') }}">Новости</a>
                {{--            <a href="{{ route('contacts') }}">Контакты</a>--}}
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-columns">
                <div class="footer-col">
                    <h3>Контакты</h3>
                    <p>Email: znamenka-2013@mail.ru</p>
                    <p>Телефон: +7 (347-86) 2-21-35</p>
                </div>
                <div class="footer-col">
                    <h3>Адрес</h3>
                    <p>452032, Республика Башкортостан,<br>
                        Белебеевский район, с. Знаменка,<br>
                        ул. Советская, 46</p>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
