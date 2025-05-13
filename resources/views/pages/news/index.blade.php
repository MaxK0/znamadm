@extends('layouts.main')

@section('title', 'Новости сельского поселения')
@section('content')
    <section class="news-section">
        <div class="container">
            <h1 class="section-title">Последние новости</h1>

            <div class="news-list">
                @forelse($news as $item)
                    <article class="news-item">
                        <div class="news-header">
                            @if($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}"
                                     alt="{{ $item->title }}"
                                     class="news-image">
                            @endif
                            <div class="news-meta">
                                <time datetime="{{ $item->published_at->toIso8601String() }}"
                                      class="news-date">
                                    {{ $item->published_at->translatedFormat('j F Y') }}
                                </time>
                                @if($item->user)
                                    <div class="news-author">
                                        Автор: {{ $item->user->name }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <h2 class="news-title">{{ $item->title }}</h2>
                        <div class="news-excerpt">
                            {{ Str::limit($item->description, 200) }}
                        </div>
{{--                        <a href="{{ route('news.show', $item) }}"--}}
{{--                           class="news-read-more">--}}
{{--                            Читать полностью--}}
{{--                        </a>--}}
                    </article>
                @empty
                    <div class="no-news">
                        На данный момент новостей нет
                    </div>
                @endforelse
            </div>

            {{ $news->links() }}
        </div>
    </section>
@endsection
