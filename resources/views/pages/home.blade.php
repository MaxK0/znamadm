@extends('layouts.main')

@section('title', 'Главная')
@section('content')
    <section class="welcome-section">
        <div class="container">
            <h2 class="section-title">Добро пожаловать</h2>
            <p>На сайте Вы сможете ознакомиться с данными по культуре, образованию, спорту и социальному развитию сельского поселения, узнать историю создания и самые свежие новости.</p>

            <div class="signature">
                <p>С уважением,<br>
                    Глава сельского поселения</p>
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
@endsection
