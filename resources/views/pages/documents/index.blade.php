@extends('layouts.main')

@section('title', 'Документы')
@section('content')
    <section>
        <div class="container">
            <h2 class="section-title">Документы</h2>

            <form action="{{ route('documents') }}" method="GET" class="document-search">
                <div class="search-wrapper">
                    <input type="text" name="search" placeholder="Поиск по документам..."
                           value="{{ request('search') }}" class="input">
                    <button type="submit" class="search-button">Найти</button>
                </div>
            </form>

            @if(request('search') && $types->sum(fn($type) => $type->documents->count()) === 0)
                <div class="no-results">
                    По вашему запросу "{{ request('search') }}" ничего не найдено.
                </div>
            @endif

            <div class="document-types">
                @foreach($types as $type)
                    @if($type->documents->count() > 0)
                        <div class="document-type">
                            <h3>{{ $type->title }}</h3>
                            <div class="documents-list">
                                @foreach($type->documents as $doc)
                                    <div class="document-item">
                                        <a href="{{ asset('storage/' . $doc->file_path) }}" download class="document-link">
                                            <span class="document-title">{{ $doc->title }}</span>
                                            <span class="document-date">({{ $doc->published_at->format('d.m.Y') }})</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
