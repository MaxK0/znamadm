@extends('layouts.main')

@section('title', 'Депутаты сельского совета')
@section('content')
    <section class="deputies-section">
        <div class="container">
            <h1 class="section-title">Депутаты</h1>

            <div class="deputies-grid">
                @forelse($deputies as $deputy)
                    <div class="deputy-card">
                        <div class="deputy-photo">
                            <div class="photo-placeholder">
                                <svg class="user-icon" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="deputy-info">
                            <h3 class="deputy-name">{{ $deputy->fio }}</h3>
                            <div class="deputy-meta">
                                <div class="meta-item">
                                    <span class="meta-label">Должность:</span>
                                    {{ $deputy->position }}
                                </div>
                                <div class="meta-item">
                                    <span class="meta-label">Дата рождения:</span>
                                    {{ $deputy->birth_date->translatedFormat('j F Y') }}
                                </div>
                                <div class="meta-item">
                                    <span class="meta-label">Телефон:</span>
                                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $deputy->phone) }}">
                                        {{ $deputy->phone }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="no-deputies">
                        Информация о депутатах временно отсутствует
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
