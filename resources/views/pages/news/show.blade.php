@extends('layouts.main')

@section('title', $news->title)

@section('content')
    <article class="news-article">
        <header class="article-header">
            <div class="container">
                <nav class="breadcrumb">
                    <a href="{{ route('home') }}">Главная</a>
                    <span> / </span>
                    <a href="{{ route('news') }}">Новости</a>
                    <span> / {{ $news->title }}</span>
                </nav>

                <time datetime="{{ $news->published_at->toIso8601String() }}"
                      class="article-date">
                    {{ $news->published_at->translatedFormat('j F Y') }}
                </time>
                <h1 class="article-title">{{ $news->title }}</h1>

                @if($news->image_path)
                    <figure class="article-image">
                        <img src="{{ asset('storage/' . $news->image_path) }}"
                             alt="{{ $news->title }}"
                             class="img-responsive">
                    </figure>
                @endif
            </div>
        </header>

        <div class="article-content container">
            <div class="content-wrapper">
                {!! nl2br(e($news->description)) !!}
            </div>

            @if($relatedNews->isNotEmpty())
                <section class="related-news">
                    <h2 class="section-title">Другие новости</h2>
                    <div class="news-grid">
                        @foreach($relatedNews as $item)
                            <div class="news-card">
                                @if($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}"
                                         alt="{{ $item->title }}">
                                @endif
                                <div class="news-content">
                                    <h3>{{ $item->title }}</h3>
                                    <a href="{{ route('news.show', $item) }}"
                                       class="news-read-more">
                                        Подробнее
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </article>
@endsection
