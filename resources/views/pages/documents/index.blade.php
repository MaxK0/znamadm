@extends('layouts.main')

@section('title', 'Документы')
@section('content')
    <section>
        <div class="container">
            <h2 class="section-title">Документы</h2>

            @foreach($types as $type)
                <div class="document-type">
                    <h3>{{ $type->title }}</h3>
                    <div class="documents-list">
                        @foreach($type->documents as $doc)
                            <div class="document-item">
                                <a href="{{ asset('storage/' . $doc->file_path) }}" download>
                                    {{ $doc->title }} ({{ $doc->published_at->format('d.m.Y') }})
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
