@extends('layouts.app')

@section('content')

<section class="page-hero py-5 py-lg-6 page-hero-services position-relative">
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <nav aria-label="breadcrumb" class="mb-4 d-flex justify-content-center">
                    <ol class="breadcrumb moly-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('messages.nav.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.nav.services')</li>
                    </ol>
                </nav>
                <span class="section-label gold-text mb-3 d-block">
                    <i class="bi bi-dash-lg me-2"></i>@lang('messages.nav.services')<i class="bi bi-dash-lg ms-2"></i>
                </span>
                <h1 class="page-title font-display mb-4">@lang('messages.services.title')</h1>
                <p class="page-subtitle mx-auto">@lang('messages.services.subtitle')</p>
                <div class="d-flex flex-wrap justify-content-center gap-3 mt-5">
                    <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer"
                       class="btn btn-whatsapp d-inline-flex align-items-center">
                        <i class="bi bi-whatsapp me-2"></i>
                        @lang('messages.hero.cta_whatsapp')
                    </a>
                    <span class="no-sex-badge small d-inline-flex align-items-center">
                        <i class="bi bi-shield-check me-1"></i>
                        @lang('messages.policy.no_sex_short')
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="moly-section py-5 py-lg-6">
    <div class="container">
        <div class="row g-4 g-lg-5 services-row">
            @foreach($services as $service)
                <div id="service-{{ $service->slug }}" class="col-md-6 col-lg-4 d-flex">
                    @include('partials.service-card', ['service' => $service])
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="moly-section py-5 py-lg-6 techniques-section">
    <div class="container">
        <div class="section-header text-center mb-5 reveal">
            <span class="section-label gold-text mb-2 d-block">
                <i class="bi bi-dash-lg me-2"></i>
                @lang('messages.techniques.label')
                <i class="bi bi-dash-lg ms-2"></i>
            </span>
            <h2 class="section-title font-display">{!! __('messages.techniques.title') !!}</h2>
            <p class="section-subtitle mx-auto">@lang('messages.techniques.subtitle')</p>
        </div>

        <div class="row g-4 g-lg-5">
            <div class="col-lg-4 reveal">
                <div class="techniques-card h-100">
                    <div class="techniques-card-icon"><i class="bi bi-person-check"></i></div>
                    <h4 class="techniques-card-title font-display mb-4">@lang('messages.techniques.card_full_title')</h4>
                    <ul class="techniques-list list-unstyled mb-0">
                        @foreach(__('messages.techniques.card_full_items') as $item)
                            <li><i class="bi bi-check2-circle gold-text me-2"></i>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 reveal-delay-1">
                <div class="techniques-card h-100">
                    <div class="techniques-card-icon"><i class="bi bi-head-side"></i></div>
                    <h4 class="techniques-card-title font-display mb-4">@lang('messages.techniques.card_head_title')</h4>
                    <ul class="techniques-list list-unstyled mb-0">
                        @foreach(__('messages.techniques.card_head_items') as $item)
                            <li><i class="bi bi-check2-circle gold-text me-2"></i>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 reveal-delay-2">
                <div class="techniques-card h-100">
                    <div class="techniques-card-icon"><i class="bi bi-sparkles"></i></div>
                    <h4 class="techniques-card-title font-display mb-4">@lang('messages.techniques.card_special_title')</h4>
                    <ul class="techniques-list list-unstyled mb-0">
                        @foreach(__('messages.techniques.card_special_items') as $item)
                            <li><i class="bi bi-check2-circle gold-text me-2"></i>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <p class="techniques-extra mt-4 mb-0"><i class="bi bi-info-circle gold-text me-2"></i>@lang('messages.techniques.extra')</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="moly-section py-5 py-lg-6 cta-section">
    <div class="container">
        <div class="cta-wrapper text-center reveal">
            <span class="cta-gold-label mb-3 d-block">
                <i class="bi bi-spa gold-text me-2"></i>{{ config('moly.business.name') }}
            </span>
            <h2 class="cta-title font-display mb-4">@lang('messages.cta.title')</h2>
            <p class="cta-subtitle mx-auto mb-5">@lang('messages.cta.subtitle')</p>
            <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer"
               class="btn btn-whatsapp btn-lg cta-wa-btn d-inline-flex align-items-center">
                <i class="bi bi-whatsapp me-2"></i>
                @lang('messages.cta.button')
            </a>
        </div>
    </div>
</section>

@php
    $molyServices = $services->map(function ($s) {
        return [
            'id' => $s->id,
            'name' => $s->name,
            'prices' => $s->prices->map(function ($p) {
                return ['id' => $p->id, 'duration' => $p->duration, 'price' => $p->price];
            }),
        ];
    });
@endphp
<script>
window.MOLY_SERVICES = @json($molyServices);
</script>

@endsection
