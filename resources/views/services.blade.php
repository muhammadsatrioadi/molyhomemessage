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
                <h1 class="page-title mb-4">@lang('messages.services.title')</h1>
                <p class="page-subtitle mx-auto">@lang('messages.services.subtitle')</p>
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

<section class="moly-section py-5 py-lg-6 cta-section">
    <div class="container">
        <div class="cta-wrapper text-center reveal">
            <h2 class="cta-title mb-4">@lang('messages.cta.title')</h2>
            <p class="cta-subtitle mx-auto mb-5">@lang('messages.cta.subtitle')</p>
            <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer"
               class="btn btn-moly-gold btn-lg cta-wa-btn">
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
