@extends('layouts.main')

@section('title', 'Новости сельского поселения')
@section('content')
    <section class="news-section">
        <div class="container">
            <h1 class="section-title">Новости</h1>

            <form action="{{ route('news') }}" method="GET" class="news-search">
                <div class="search-wrapper">
                    <input type="text" name="search" placeholder="Поиск по новостям..."
                           value="{{ request('search') }}" class="input">
                    <button type="submit" class="search-button">Найти</button>
                </div>
            </form>

            @if(request('search') && $news->isEmpty())
                <div class="no-results">
                    По вашему запросу "{{ request('search') }}" ничего не найдено.
                </div>
            @endif

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
                        <a href="{{ route('news.show', $item) }}" class="link-main">
                            <h2 class="news-title">{{ $item->title }}</h2>

                        </a>
                        <div class="news-excerpt">
                            {{ Str::limit($item->description, 200) }}
                        </div>
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
