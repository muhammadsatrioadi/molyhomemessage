@extends('layouts.app')

@section('content')

@php
    $klcc = ['Kuala Lumpur', 'KLCC', 'Bukit Bintang', 'Chow Kit', 'Bukit Ceylon', 'Bukit Tunku', 'Brickfields'];
    $fringe = ['Bangsar', 'Ampang', 'Cheras', 'Sungai Besi', 'Kuchai Lama'];
    $greater = ['Mont Kiara', 'Sri Hartamas', 'Bukit Jalil', 'Petaling Jaya', 'Bandar Utama', 'Damansara Perdana', 'Kota Damansara', 'Bandar Sunway'];
    $areasByName = $areas->keyBy('name');
@endphp

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
                    <i class="bi bi-dash-lg me-2"></i>@lang('messages.areas.label')<i class="bi bi-dash-lg ms-2"></i>
                </span>
                <h1 class="page-title font-display mb-4">{!! __('messages.areas.title') !!}</h1>
                <p class="page-subtitle mx-auto">@lang('messages.areas.subtitle')</p>
            </div>
        </div>
    </div>
</section>

<section class="moly-section py-5 py-lg-6">
    <div class="container">
        <div class="mb-5 mb-lg-6 reveal">
            <div class="areas-cards-grid">
                @foreach($klcc as $name)
                    @if(isset($areasByName[$name]))
                        <div class="area-card">
                            <span class="area-card-icon"><i class="bi bi-buildings"></i></span>
                            <span class="area-card-name">{{ $areasByName[$name]->name }}</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="mb-5 mb-lg-6 reveal-delay-1">
            <div class="areas-cards-grid">
                @foreach($fringe as $name)
                    @if(isset($areasByName[$name]))
                        <div class="area-card">
                            <span class="area-card-icon"><i class="bi bi-tree"></i></span>
                            <span class="area-card-name">{{ $areasByName[$name]->name }}</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="mb-5 mb-lg-6 reveal-delay-2">
            <div class="areas-cards-grid">
                @foreach($greater as $name)
                    @if(isset($areasByName[$name]))
                        <div class="area-card">
                            <span class="area-card-icon"><i class="bi bi-geo-fill"></i></span>
                            <span class="area-card-name">{{ $areasByName[$name]->name }}</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="row g-4 g-lg-5 mt-5">
            <div class="col-lg-6 reveal">
                <div class="info-card h-100 p-4 p-lg-5">
                    <div class="info-icon mb-4 gold-text"><i class="bi bi-buildings"></i></div>
                    <h3 class="info-title font-display mb-3">@lang('messages.areas.cat_klcc_title')</h3>
                    <p class="info-desc mb-0">
                        Main service areas include Kuala Lumpur, KLCC, Bukit Bintang, Chow Kit, Bukit Ceylon, Bukit Tunku and Brickfields, serving major hotels, serviced residences and business establishments in the city centre.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 reveal-delay-1">
                <div class="info-card h-100 p-4 p-lg-5">
                    <div class="info-icon mb-4 gold-text"><i class="bi bi-house-heart"></i></div>
                    <h3 class="info-title font-display mb-3">@lang('messages.areas.cat_fringe_title') & @lang('messages.areas.cat_greater_title')</h3>
                    <p class="info-desc mb-0">
                        For residents of Bangsar, Ampang, Cheras, Sungai Besi, Kuchai Lama, Mont Kiara, Sri Hartamas, Bukit Jalil, Petaling Jaya, Bandar Utama, Damansara Perdana, Kota Damansara and Bandar Sunway — we come directly to your apartment, condo or residence.
                    </p>
                </div>
            </div>
        </div>

        <div class="areas-note-box text-center mt-5 p-4 p-lg-5 reveal-delay-2">
            <i class="bi bi-info-circle gold-text me-2 fs-5"></i>
            <span class="areas-note-large">@lang('messages.areas.note')</span>
            <div class="mt-4">
                <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer"
                   class="btn btn-whatsapp d-inline-flex align-items-center">
                    <i class="bi bi-whatsapp me-2"></i>
                    @lang('messages.contact.cta')
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
