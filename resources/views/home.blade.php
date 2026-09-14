@extends('layouts.app')

@section('content')

@include('partials.hero')

<section id="trust-section" class="moly-section trust-section py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4 reveal">
                <div class="trust-item text-center">
                    <div class="trust-icon mb-3"><i class="bi bi-award"></i></div>
                    <h4 class="trust-title mb-2">@lang('messages.trust.professional')</h4>
                    <p class="trust-desc mb-0">@lang('messages.trust.professional_desc')</p>
                </div>
            </div>
            <div class="col-md-4 reveal-delay-1">
                <div class="trust-item text-center">
                    <div class="trust-icon mb-3"><i class="bi bi-house-heart"></i></div>
                    <h4 class="trust-title mb-2">@lang('messages.trust.convenient')</h4>
                    <p class="trust-desc mb-0">@lang('messages.trust.convenient_desc')</p>
                </div>
            </div>
            <div class="col-md-4 reveal-delay-2">
                <div class="trust-item text-center">
                    <div class="trust-icon mb-3"><i class="bi bi-clock-history"></i></div>
                    <h4 class="trust-title mb-2">@lang('messages.trust.flexible')</h4>
                    <p class="trust-desc mb-0">@lang('messages.trust.flexible_desc')</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services-section" class="moly-section py-5 py-lg-6">
    <div class="container">
        <div class="section-header text-center mb-5 reveal">
            <span class="section-label gold-text mb-2 d-block">
                <i class="bi bi-dash-lg me-2"></i>
                @lang('messages.nav.services')
                <i class="bi bi-dash-lg ms-2"></i>
            </span>
            <h2 class="section-title">@lang('messages.services.title')</h2>
            <p class="section-subtitle mx-auto">@lang('messages.services.subtitle')</p>
        </div>

        <div class="row g-4 g-lg-5 services-row" id="services-grid">
            @foreach($services as $service)
                <div id="service-{{ $service->slug }}" class="col-md-6 col-lg-4 d-flex">
                    @include('partials.service-card', ['service' => $service])
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="why-section" class="moly-section py-5 py-lg-6 why-section">
    <div class="container">
        <div class="section-header text-center mb-5 reveal">
            <span class="section-label gold-text mb-2 d-block">
                <i class="bi bi-dash-lg me-2"></i>
                @lang('messages.nav.about')
                <i class="bi bi-dash-lg ms-2"></i>
            </span>
            <h2 class="section-title">@lang('messages.why_choose.title')</h2>
            <p class="section-subtitle mx-auto">@lang('messages.why_choose.subtitle')</p>
        </div>

        <div class="row g-4 g-lg-5">
            @foreach(__('messages.why_choose.items') as $idx => $item)
                @php
                    $icons = ['bi-person-badge', 'bi-house-door', 'bi-calendar2-check', 'bi-emoji-smile', 'bi-geo-alt', 'bi-whatsapp'];
                @endphp
                <div class="col-md-6 col-lg-4 reveal" style="transition-delay: {{ $idx * 50 }}ms">
                    <div class="why-card h-100 p-4 p-lg-5">
                        <div class="why-icon mb-4"><i class="bi {{ $icons[$idx] }}"></i></div>
                        <h4 class="why-title mb-3">{{ $item['title'] }}</h4>
                        <p class="why-desc mb-0">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="how-section" class="moly-section py-5 py-lg-6">
    <div class="container">
        <div class="section-header text-center mb-5 reveal">
            <span class="section-label gold-text mb-2 d-block">
                <i class="bi bi-dash-lg me-2"></i>
                @lang('messages.how_it_works.title')
                <i class="bi bi-dash-lg ms-2"></i>
            </span>
            <h2 class="section-title">@lang('messages.how_it_works.title')</h2>
            <p class="section-subtitle mx-auto">@lang('messages.how_it_works.subtitle')</p>
        </div>

        <div class="row g-4 g-lg-5 how-row">
            @foreach(__('messages.how_it_works.steps') as $idx => $step)
                <div class="col-sm-6 col-lg-3 d-flex reveal" style="transition-delay: {{ $idx * 80 }}ms">
                    <div class="how-card h-100 w-100 text-center p-4">
                        <div class="how-step-number gold-text mb-3">0{{ $idx + 1 }}</div>
                        <h4 class="how-title mb-3">{{ $step['title'] }}</h4>
                        <p class="how-desc mb-0">{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="areas-section" class="moly-section py-5 py-lg-6 areas-section">
    <div class="container">
        <div class="section-header text-center mb-5 reveal">
            <span class="section-label gold-text mb-2 d-block">
                <i class="bi bi-dash-lg me-2"></i>
                @lang('messages.nav.areas')
                <i class="bi bi-dash-lg ms-2"></i>
            </span>
            <h2 class="section-title">@lang('messages.areas.title')</h2>
            <p class="section-subtitle mx-auto">@lang('messages.areas.subtitle')</p>
        </div>

        <div class="areas-grid reveal-delay-1">
            @foreach($areas as $area)
                <div class="area-chip">
                    <i class="bi bi-geo-alt-fill gold-text me-2"></i>{{ $area->name }}
                </div>
            @endforeach
        </div>

        <p class="areas-note text-center mt-5 mb-0">
            <i class="bi bi-info-circle gold-text me-2"></i>
            @lang('messages.areas.note')
        </p>
    </div>
</section>

<section id="about-section" class="moly-section py-5 py-lg-6 about-home-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 reveal">
                <div class="about-image-wrapper">
                    <div class="about-image-overlay"></div>
                    <img src="/assets/images/about-home.jpg"
                         alt="Professional massage therapy environment"
                         class="about-home-img"
                         loading="lazy">
                </div>
            </div>
            <div class="col-lg-6 reveal-delay-1">
                <span class="section-label gold-text mb-3 d-block">
                    <i class="bi bi-dash-lg me-2"></i>
                    @lang('messages.nav.about')
                    <i class="bi bi-dash-lg ms-2"></i>
                </span>
                <h2 class="section-title text-start mb-4">@lang('messages.about.title')</h2>
                <p class="about-text mb-4">@lang('messages.about.content')</p>
                <a href="{{ route('about') }}" class="btn btn-moly-gold-outline">
                    @lang('messages.nav.about')
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<section id="testimonials-section" class="moly-section py-5 py-lg-6 testimonials-section">
    <div class="container">
        <div class="section-header text-center mb-5 reveal">
            <span class="section-label gold-text mb-2 d-block">
                <i class="bi bi-dash-lg me-2"></i>
                Testimonials
                <i class="bi bi-dash-lg ms-2"></i>
            </span>
            <h2 class="section-title">@lang('messages.testimonials.title')</h2>
            <p class="section-subtitle mx-auto">@lang('messages.testimonials.subtitle')</p>
        </div>

        <div class="row g-4">
            @foreach($testimonials as $idx => $testimonial)
                <div class="col-md-6 col-lg-4 d-flex reveal" style="transition-delay: {{ $idx * 80 }}ms">
                    @include('partials.testimonial-card', ['testimonial' => $testimonial])
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="faq-section" class="moly-section py-5 py-lg-6">
    <div class="container">
        <div class="section-header text-center mb-5 reveal">
            <span class="section-label gold-text mb-2 d-block">
                <i class="bi bi-dash-lg me-2"></i>
                @lang('messages.nav.faq')
                <i class="bi bi-dash-lg ms-2"></i>
            </span>
            <h2 class="section-title">@lang('messages.faq.title')</h2>
            <p class="section-subtitle mx-auto">@lang('messages.faq.subtitle')</p>
        </div>

        <div class="accordion faq-accordion mx-auto" id="faqAccordion">
            @foreach($faqs as $idx => $faq)
                @include('partials.faq-item', ['faq' => $faq, 'index' => $idx])
            @endforeach
        </div>
    </div>
</section>

<section id="cta-section" class="moly-section py-5 py-lg-6 cta-section">
    <div class="container">
        <div class="cta-wrapper text-center reveal">
            <span class="cta-gold-label mb-3 d-block">
                <i class="bi bi-spa gold-text me-2"></i>MOLY HOME MASSAGE
            </span>
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
