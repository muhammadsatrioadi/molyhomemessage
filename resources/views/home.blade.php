@extends('layouts.app')

@section('content')

@include('partials.hero')

<section id="trust-section" class="moly-section trust-section py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-sm-6 col-lg-3 reveal">
                <div class="trust-item text-center">
                    <div class="trust-icon mb-3"><i class="bi bi-award"></i></div>
                    <h4 class="trust-title mb-2">@lang('messages.trust.professional')</h4>
                    <p class="trust-desc mb-0">@lang('messages.trust.professional_desc')</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 reveal-delay-1">
                <div class="trust-item text-center">
                    <div class="trust-icon mb-3"><i class="bi bi-house-heart"></i></div>
                    <h4 class="trust-title mb-2">@lang('messages.trust.convenient')</h4>
                    <p class="trust-desc mb-0">@lang('messages.trust.convenient_desc')</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 reveal-delay-2">
                <div class="trust-item text-center">
                    <div class="trust-icon mb-3"><i class="bi bi-clock-history"></i></div>
                    <h4 class="trust-title mb-2">@lang('messages.trust.flexible')</h4>
                    <p class="trust-desc mb-0">@lang('messages.trust.flexible_desc')</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 reveal-delay-3">
                <div class="trust-item trust-no-sex text-center">
                    <div class="trust-icon trust-icon-shield mb-3"><i class="bi bi-shield-check"></i></div>
                    <h4 class="trust-title mb-2">@lang('messages.footer.no_sex_badge')</h4>
                    <p class="trust-desc mb-0 cream-text">@lang('messages.policy.no_sex_desc')</p>
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
            <h2 class="section-title font-display">@lang('messages.services.title')</h2>
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

<section id="techniques-section" class="moly-section py-5 py-lg-6 techniques-section">
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
                    <h4 class="techniques-card-title font-display mb-4">
                        <span class="techniques-card-icon"><i class="bi bi-person-check"></i></span>
                        @lang('messages.techniques.card_full_title')
                    </h4>
                    <ul class="techniques-list list-unstyled mb-0">
                        @foreach(__('messages.techniques.card_full_items') as $item)
                            <li><i class="bi bi-check2-circle gold-text me-2"></i>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 reveal-delay-1">
                <div class="techniques-card h-100">
                    <h4 class="techniques-card-title font-display mb-4">
                        <span class="techniques-card-icon"><i class="bi bi-bandaid-fill"></i></span>
                        @lang('messages.techniques.card_head_title')
                    </h4>
                    <ul class="techniques-list list-unstyled mb-0">
                        @foreach(__('messages.techniques.card_head_items') as $item)
                            <li><i class="bi bi-check2-circle gold-text me-2"></i>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 reveal-delay-2">
                <div class="techniques-card h-100">
                    <h4 class="techniques-card-title font-display mb-4">
                        <span class="techniques-card-icon"><i class="bi bi-stars"></i></span>
                        @lang('messages.techniques.card_special_title')
                    </h4>
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

<section id="hotel-section" class="moly-section py-5 py-lg-6">
    <div class="container">
        <div class="feature-split feature-hotel reveal">
            <div class="feature-split-image order-2 order-lg-1">
                <img src="{{ asset('assets/images/section-hotel-room.jpg') }}"
                     alt="Hotel room massage — professional in-room wellness service"
                     loading="lazy"
                     decoding="async">
            </div>
            <div class="feature-split-text-card order-1 order-lg-2">
                <span class="feature-split-label d-inline-flex align-items-center mb-3">
                    <span class="feature-split-label-icon"><i class="bi bi-hotel"></i></span>
                    @lang('messages.delivery.hotel_label')
                </span>
                <h2 class="feature-split-title font-display mb-4">{!! __('messages.delivery.hotel_title') !!}</h2>
                <p class="feature-split-desc mb-4">@lang('messages.delivery.hotel_desc')</p>
                <ul class="feature-checklist list-unstyled mb-5">
                    @foreach(__('messages.delivery.hotel_checklist') as $item)
                        <li><span class="check-dot"><i class="bi bi-check"></i></span>{{ $item }}</li>
                    @endforeach
                </ul>
                <a href="{{ whatsapp_contact_url('Hotel Room Massage — Hello ' . config('moly.business.name') . ', I would like to book a hotel room massage.') }}"
                   target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp d-inline-flex align-items-center">
                    <i class="bi bi-whatsapp me-2"></i>
                    @lang('messages.hero.cta_whatsapp')
                </a>
            </div>
        </div>
    </div>
</section>

<section id="couples-section" class="moly-section py-5 py-lg-6 couples-section">
    <div class="container">
        <div class="feature-split feature-couples reveal">
            <div class="feature-split-text-card order-1 order-lg-1">
                <span class="feature-split-label d-inline-flex align-items-center mb-3">
                    <span class="feature-split-label-icon"><i class="bi bi-heart-half"></i></span>
                    @lang('messages.delivery.couples_label')
                </span>
                <h2 class="feature-split-title font-display mb-4">{!! __('messages.delivery.couples_title') !!}</h2>
                <p class="feature-split-desc mb-4">@lang('messages.delivery.couples_desc')</p>
                <ul class="feature-checklist list-unstyled mb-5">
                    @foreach(__('messages.delivery.couples_checklist') as $item)
                        <li><span class="check-dot"><i class="bi bi-check"></i></span>{{ $item }}</li>
                    @endforeach
                </ul>
                <a href="{{ whatsapp_contact_url('Couples Shared Session — Hello ' . config('moly.business.name') . ', I would like to book a couples/shared session.') }}"
                   target="_blank" rel="noopener noreferrer" class="btn btn-moly-gold d-inline-flex align-items-center">
                    <i class="bi bi-calendar2-heart me-2"></i>
                    @lang('messages.nav.book_now')
                </a>
            </div>
            <div class="feature-split-image order-2 order-lg-2">
                <img src="{{ asset('assets/images/section-couples.jpg') }}"
                     alt="Couples and shared sessions — side-by-side professional massage"
                     loading="lazy"
                     decoding="async">
            </div>
        </div>
    </div>
</section>

<section id="home-delivery-section" class="moly-section py-5 py-lg-6">
    <div class="container">
        <div class="feature-split feature-home reveal">
            <div class="feature-split-image order-2 order-lg-1">
                <img src="{{ asset('assets/images/section-home-massage.jpg') }}"
                     alt="Home massage — therapist comes to your comfortable residence"
                     loading="lazy"
                     decoding="async">
            </div>
            <div class="feature-split-text-card order-1 order-lg-2">
                <span class="feature-split-label d-inline-flex align-items-center mb-3">
                    <span class="feature-split-label-icon"><i class="bi bi-house-heart-fill"></i></span>
                    @lang('messages.delivery.home_label')
                </span>
                <h2 class="feature-split-title font-display mb-4">{!! __('messages.delivery.home_title') !!}</h2>
                <p class="feature-split-desc mb-4">@lang('messages.delivery.home_desc')</p>
                <ul class="feature-checklist list-unstyled mb-5">
                    @foreach(__('messages.delivery.home_checklist') as $item)
                        <li><span class="check-dot"><i class="bi bi-check"></i></span>{{ $item }}</li>
                    @endforeach
                </ul>
                <a href="{{ whatsapp_contact_url('Home Massage — Hello ' . config('moly.business.name') . ', I would like to book a home massage.') }}"
                   target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp d-inline-flex align-items-center">
                    <i class="bi bi-whatsapp me-2"></i>
                    @lang('messages.hero.cta_whatsapp')
                </a>
            </div>
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
            <h2 class="section-title font-display">@lang('messages.why_choose.title')</h2>
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
                        <h4 class="why-title mb-3 font-display">{{ $item['title'] }}</h4>
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
            <h2 class="section-title font-display">@lang('messages.how_it_works.title')</h2>
            <p class="section-subtitle mx-auto">@lang('messages.how_it_works.subtitle')</p>
        </div>

        <div class="row g-4 g-lg-5 how-row">
            @foreach(__('messages.how_it_works.steps') as $idx => $step)
                <div class="col-sm-6 col-lg-3 d-flex reveal" style="transition-delay: {{ $idx * 80 }}ms">
                    <div class="how-card h-100 w-100 text-center p-4">
                        <div class="how-step-number gold-text mb-3 font-display">0{{ $idx + 1 }}</div>
                        <h4 class="how-title mb-3 font-display">{{ $step['title'] }}</h4>
                        <p class="how-desc mb-0">{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@php
    $klcc = ['KLCC', 'Bukit Bintang', 'Bukit Tunku', 'Chowkit', 'Medan Tuanku', 'Pudu', 'TRX (Tun Razak Exchange)', 'KL Sentral', 'Brickfield'];
    $fringe = ['Titiwangsa', 'Seputeh', 'Bangsar', 'Bukit Damansara', 'Damansara Heights', 'Ampang', 'Kenny Hills'];
    $greater = ['Mont Kiara', 'Sri Hartamas', 'Petaling Jaya', 'Melawati', 'Setapak', 'Damansara', 'Cheras'];
    $areasByName = $areas->keyBy('name');
@endphp

<section id="areas-section" class="moly-section py-5 py-lg-6 areas-section">
    <div class="container">
        <div class="section-header text-center mb-5 mb-lg-6 reveal">
            <span class="section-label gold-text mb-2 d-block">
                <i class="bi bi-dash-lg me-2"></i>
                @lang('messages.areas.label')
                <i class="bi bi-dash-lg ms-2"></i>
            </span>
            <h2 class="section-title font-display">{!! __('messages.areas.title') !!}</h2>
            <p class="section-subtitle mx-auto">@lang('messages.areas.subtitle')</p>
        </div>

        <div class="mb-5 mb-lg-6 reveal">
            <h3 class="area-category-title font-display mb-2">@lang('messages.areas.cat_klcc_title')</h3>
            <p class="area-category-desc mb-4 mb-lg-5">@lang('messages.areas.cat_klcc_desc')</p>
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
            <h3 class="area-category-title font-display mb-2">@lang('messages.areas.cat_fringe_title')</h3>
            <p class="area-category-desc mb-4 mb-lg-5">@lang('messages.areas.cat_fringe_desc')</p>
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

        <div class="reveal-delay-2">
            <h3 class="area-category-title font-display mb-2">@lang('messages.areas.cat_greater_title')</h3>
            <p class="area-category-desc mb-4 mb-lg-5">@lang('messages.areas.cat_greater_desc')</p>
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

        <p class="areas-note text-center mt-5 mt-lg-6 mb-0">
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
                    <img src="{{ asset('assets/images/about-home.jpg') }}"
                         alt="Professional massage therapy environment — {{ config('moly.business.name') }}"
                         class="about-home-img"
                         loading="lazy"
                         decoding="async">
                </div>
            </div>
            <div class="col-lg-6 reveal-delay-1">
                <span class="section-label gold-text mb-3 d-block">
                    <i class="bi bi-dash-lg me-2"></i>
                    @lang('messages.nav.about')
                    <i class="bi bi-dash-lg ms-2"></i>
                </span>
                <h2 class="section-title font-display text-start mb-4">@lang('messages.about.title')</h2>
                <p class="about-text mb-4">@lang('messages.about.content')</p>
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <span class="no-sex-badge small d-inline-flex align-items-center">
                        <i class="bi bi-shield-check me-1"></i>
                        @lang('messages.policy.no_sex_short')
                    </span>
                </div>
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
                @lang('messages.testimonials.label')
                <i class="bi bi-dash-lg ms-2"></i>
            </span>
            <h2 class="section-title font-display">@lang('messages.testimonials.title')</h2>
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
                @lang('messages.faq.label')
                <i class="bi bi-dash-lg ms-2"></i>
            </span>
            <h2 class="section-title font-display">@lang('messages.faq.title')</h2>
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
