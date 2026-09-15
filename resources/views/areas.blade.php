@extends('layouts.app')

@section('content')

<section class="page-hero py-5 py-lg-6 page-hero-areas position-relative">
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <nav aria-label="breadcrumb" class="mb-4 d-flex justify-content-center">
                    <ol class="breadcrumb moly-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('messages.nav.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.nav.areas')</li>
                    </ol>
                </nav>
                <span class="section-label gold-text mb-3 d-block">
                    <i class="bi bi-dash-lg me-2"></i>@lang('messages.nav.areas')<i class="bi bi-dash-lg ms-2"></i>
                </span>
                <h1 class="page-title mb-4">@lang('messages.areas.title')</h1>
                <p class="page-subtitle mx-auto">@lang('messages.areas.subtitle')</p>
            </div>
        </div>
    </div>
</section>

<section class="moly-section py-5 py-lg-6">
    <div class="container">
        <div class="areas-grid reveal mb-5">
            @foreach($areas as $area)
                <div class="area-chip area-chip-lg">
                    <i class="bi bi-geo-alt-fill gold-text me-2"></i>{{ $area->name }}
                </div>
            @endforeach
        </div>

        <div class="row g-4 g-lg-5 mt-5">
            <div class="col-lg-6 reveal">
                <div class="info-card h-100 p-4 p-lg-5">
                    <div class="info-icon mb-4 gold-text"><i class="bi bi-geo-alt"></i></div>
                    <h3 class="info-title mb-3">City Centre Coverage</h3>
                    <p class="info-desc mb-0">
                        Our most frequented areas include the vibrant KLCC, Bukit Bintang, Bukit Tunku, Chowkit,
                        Medan Tuanku and Pudu districts, where we serve guests staying in major hotels and
                        serviced apartments. We also regularly visit the KL Sentral transportation hub area
                        for convenience of travellers and commuters.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 reveal-delay-1">
                <div class="info-card h-100 p-4 p-lg-5">
                    <div class="info-icon mb-4 gold-text"><i class="bi bi-house-heart"></i></div>
                    <h3 class="info-title mb-3">Residential Neighbourhoods</h3>
                    <p class="info-desc mb-0">
                        For residents of Bangsar, Mont Kiara, Sri Hartamas, Ampang, Damansara, Setapak and
                        Cheras, we offer home visits directly to your apartment, condo, or landed residence.
                        Enjoy a premium massage without stepping outside your home.
                    </p>
                </div>
            </div>
        </div>

        <div class="areas-note-box text-center mt-5 p-4 reveal-delay-2">
            <i class="bi bi-info-circle gold-text me-2 fs-5"></i>
            <span class="areas-note-large">@lang('messages.areas.note')</span>
            <div class="mt-4">
                <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer"
                   class="btn btn-moly-gold">
                    <i class="bi bi-whatsapp me-2"></i>
                    @lang('messages.contact.cta')
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
