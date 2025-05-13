@extends('layouts.main')

@section('title', $type->title)

@section('content')
    <section class="documents-section">
        <div class="container">
            <nav class="breadcrumb">
                <a href="{{ route('home') }}">Главная</a>
                <span> / </span>
                <a href="{{ route('documents') }}">Документы</a>
                <span> / {{ $type->title }}</span>
            </nav>

            <h1 class="section-title">{{ $type->title }}</h1>

            @if($type->description)
                <div class="type-description">
                    {!! nl2br(e($type->description)) !!}
                </div>
            @endif

            <div class="documents-list">
                @forelse($documents as $document)
                    <div class="document-item">
                        <div class="document-icon">📄</div>
                        <div class="document-info">
                            <div class="document-meta">
                                <time datetime="{{ $document->published_at->toIso8601String() }}">
                                    {{ $document->published_at->translatedFormat('j F Y') }}
                                </time>
                                @if(!$document->is_relevant)
                                    <span class="document-status obsolete">Устаревший</span>
                                @endif
                            </div>
                            <h3 class="document-title">
                                <a href="{{ asset('storage/' . $document->file_path) }}"
                                   download="{{ Str::slug($document->title) }}.pdf"
                                   class="document-link">
                                    {{ $document->title }}
                                </a>
                            </h3>
                            @if($document->description)
                                <p class="document-description">
                                    {{ $document->description }}
                                </p>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="no-documents">
                        В этой категории документов пока нет
                    </div>
                @endforelse
            </div>

            {{ $documents->links() }}
        </div>
    </section>
@endsection
