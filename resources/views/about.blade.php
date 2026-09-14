@extends('layouts.app')

@section('content')

<section class="page-hero py-5 py-lg-6 page-hero-about position-relative">
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <nav aria-label="breadcrumb" class="mb-4 d-flex justify-content-center">
                    <ol class="breadcrumb moly-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('messages.nav.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.nav.about')</li>
                    </ol>
                </nav>
                <span class="section-label gold-text mb-3 d-block">
                    <i class="bi bi-dash-lg me-2"></i>@lang('messages.nav.about')<i class="bi bi-dash-lg ms-2"></i>
                </span>
                <h1 class="page-title mb-4">@lang('messages.about.title')</h1>
                <p class="page-subtitle mx-auto">@lang('messages.about.content')</p>
            </div>
        </div>
    </div>
</section>

<section class="moly-section py-5 py-lg-6">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 reveal">
                <div class="about-image-wrapper">
                    <div class="about-image-overlay"></div>
                    <img src="/assets/images/about-1.jpg"
                         alt="Professional massage session"
                         class="about-home-img" loading="lazy">
                </div>
            </div>
            <div class="col-lg-6 reveal-delay-1">
                <h2 class="section-title text-start mb-4">Our Philosophy</h2>
                <p class="about-text mb-4">
                    At MOLY HOME MASSAGE, we believe that relaxation and wellbeing should never be a luxury
                    reserved for spa visits. Our philosophy centres on bringing the therapeutic benefits of
                    professional massage directly to the spaces where you feel most at ease.
                </p>
                <p class="about-text mb-4">
                    Established with a focus on Kuala Lumpur's residents, travellers, and business visitors,
                    our mission is to make high-quality massage therapy both convenient and accessible. Every
                    session is delivered with care, professionalism, and respect for your personal comfort.
                </p>
                <p class="about-text mb-0">
                    Whether you are winding down after a long week, recovering from travel, or simply treating
                    yourself to a moment of calm, our team is here to help you relax in the comfort of your
                    own surroundings.
                </p>
            </div>
        </div>
    </div>
</section>

<section id="why-section" class="moly-section py-5 py-lg-6 why-section">
    <div class="container">
        <div class="section-header text-center mb-5 reveal">
            <span class="section-label gold-text mb-2 d-block">
                <i class="bi bi-dash-lg me-2"></i>@lang('messages.why_choose.title')<i class="bi bi-dash-lg ms-2"></i>
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

@endsection
