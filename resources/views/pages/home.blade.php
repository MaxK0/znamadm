@extends('layouts.main')

@section('title', 'Главная')
@section('content')
    <section class="title-section">
        <div class="container">
            <img src="{{ asset('/img/house.jpg') }}" alt="Знаменский сельсовет">
        </div>
    </section>
    <section class="welcome-section">
        <div class="container">
            <h2 class="section-title">Добро пожаловать</h2>
            <div class="welcome-block">
                <div class="welcome-links">
                    <a href="mailto:znamenka-2013@mail.ru" class="btn-main">znamenka-2013@mail.ru</a>
                    <a href="tel:+7 (347-86) 2-24-99" class="btn-main">+7 (347-86) 2-24-99</a>
                    <a class="welcome-vk" href="https://vk.com/club209287719">
                        <i class="fa-brands fa-vk"></i>
                    </a>
{{--                    <a href="" class="btn-main">znamenka-2013@mail.ru</a>--}}
                </div>
                <div class="welcome-text">
                    <p>На сайте Вы сможете ознакомиться с данными по культуре, образованию, спорту и социальному развитию сельского поселения, узнать историю создания и самые свежие новости.</p>
                    <div class="signature">
                        <p>С уважением,<br>
                            Глава сельского поселения</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="latest-news">
        <div class="container">
            <h2 class="section-title">Последние новости</h2>
            <div class="news-grid">
                @foreach($latestNews as $news)
                    <div class="news-card">
                        @if($news->image_path)
                            <img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}">
                        @endif
                        <div class="news-content">
                            <a class="link-main" href="{{ route('news.show', $news) }}">
                                <h3>{{ $news->title }}</h3>
                            </a>
                            <p>{{ $news->published_at->format('d.m.Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="map-section">
        <div class="container">
            <h2 class="section-title">Дополнительная информация</h2>
            <div class="map-section-info">
                <img src="{{ asset('/img/karta.png') }}" alt="map" class="map-img">
                <div class="problems">
                    <h3>Не убран мусор, яма на дороге, не горит фонарь?</h3>
                    <p>Столкнулись с проблемой — сообщите о ней!</p>
                    <button id="report-btn" class="btn-main">Сообщить о проблеме</button>
                </div>
            </div>
        </div>
    </section>

    <div id="report-modal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h3>Сообщить о проблеме</h3>
            <form id="report-form" action="{{ route('problems.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Ваше имя*</label>
                    <input class="input" type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="info">Описание проблемы*</label>
                    <textarea class="input" id="info" name="info" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="contact">Контактные данные (email/телефон)</label>
                    <input class="input" type="text" id="contact" name="contact">
                </div>
                <button type="submit" class="btn-main">Отправить</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('report-modal');
            const btn = document.getElementById('report-btn');
            const span = document.querySelector('.close-modal');

            btn.onclick = function() {
                modal.style.display = 'flex';
            }

            span.onclick = function() {
                modal.style.display = 'none';
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        });
    </script>
@endsection
