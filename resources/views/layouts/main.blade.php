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
            <div class="header-wrapper">
                <div class="logo">
                    <a href="/" class="link-nav">
                        <h1>Знаменский сельсовет</h1>
                    </a>
                </div>

                <button class="burger-menu" id="burgerMenu">
                    <i class="fas fa-bars"></i>
                </button>

                <nav class="nav" id="mainNav">
                    <a href="/">Главная</a>
                    <a href="{{ route('history') }}">История</a>
                    <a href="{{ route('deputies') }}">Совет</a>
                    <a href="{{ route('administrations') }}">Администрация</a>
                    <div class="dropdown">
                        <a href="{{ route('documents') }}">Документы</a>
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
                    <a href="{{ route('news') }}">Новости</a>
                </nav>
            </div>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const burgerMenu = document.getElementById('burgerMenu');
        const mainNav = document.getElementById('mainNav');

        burgerMenu.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        });

        // Обработка кликов по дропдаунам на мобильных
        const dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(dropdown => {
            const link = dropdown.querySelector('a');

            link.addEventListener('click', function(e) {
                if (window.innerWidth <= 800) {
                    e.preventDefault();
                    dropdown.classList.toggle('active');
                }
            });
        });

        // Закрываем меню при клике на ссылку (кроме дропдаунов)
        const navLinks = document.querySelectorAll('.nav a:not(.dropdown > a)');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 800) {
                    mainNav.classList.remove('active');
                    burgerMenu.querySelector('i').classList.remove('fa-times');
                    burgerMenu.querySelector('i').classList.add('fa-bars');
                }
            });
        });
    });
</script>
</html>
