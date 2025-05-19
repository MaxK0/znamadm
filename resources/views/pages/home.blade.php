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
                            <h3>{{ $news->title }}</h3>
                            <p>{{ $news->published_at->format('d.m.Y') }}</p>
                            {{--                        <a href="{{ route('news.show', $news) }}">Подробнее</a>--}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="map-section">
        <div class="container">
            <h2 class="section-title">Карта села Знаменка</h2>
            <img src="{{ asset('/img/karta.png') }}" alt="map" class="map-img">
        </div>
    </section>
@endsection
