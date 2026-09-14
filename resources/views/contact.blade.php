@extends('layouts.app')

@section('content')

<section class="page-hero py-5 py-lg-6 page-hero-contact position-relative">
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <nav aria-label="breadcrumb" class="mb-4 d-flex justify-content-center">
                    <ol class="breadcrumb moly-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('messages.nav.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.nav.contact')</li>
                    </ol>
                </nav>
                <span class="section-label gold-text mb-3 d-block">
                    <i class="bi bi-dash-lg me-2"></i>@lang('messages.nav.contact')<i class="bi bi-dash-lg ms-2"></i>
                </span>
                <h1 class="page-title mb-4">@lang('messages.contact.title')</h1>
                <p class="page-subtitle mx-auto">@lang('messages.contact.subtitle')</p>
            </div>
        </div>
    </div>
</section>

<section class="moly-section py-5 py-lg-6">
    <div class="container">
        <div class="row g-4 g-lg-5">
            <div class="col-md-6 col-lg-3 reveal">
                <div class="contact-card h-100 text-center p-4 p-lg-5">
                    <div class="contact-icon mb-4 gold-text"><i class="bi bi-whatsapp"></i></div>
                    <h4 class="contact-title mb-3">@lang('messages.contact.whatsapp_title')</h4>
                    <p class="contact-detail mb-4">{{ whatsapp_number_formatted() }}</p>
                    <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer"
                       class="btn btn-moly-gold w-100">
                        <i class="bi bi-whatsapp me-2"></i>WhatsApp
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal-delay-1">
                <div class="contact-card h-100 text-center p-4 p-lg-5">
                    <div class="contact-icon mb-4 gold-text"><i class="bi bi-envelope"></i></div>
                    <h4 class="contact-title mb-3">@lang('messages.contact.email_title')</h4>
                    <p class="contact-detail mb-4">
                        <a href="mailto:{{ config('moly.business.email') }}">{{ config('moly.business.email') }}</a>
                    </p>
                    <a href="mailto:{{ config('moly.business.email') }}" class="btn btn-moly-gold-outline w-100">
                        <i class="bi bi-envelope me-2"></i>Email
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal-delay-2">
                <div class="contact-card h-100 text-center p-4 p-lg-5">
                    <div class="contact-icon mb-4 gold-text"><i class="bi bi-geo-alt"></i></div>
                    <h4 class="contact-title mb-3">@lang('messages.contact.location_title')</h4>
                    <p class="contact-detail mb-4">{{ config('moly.business.location') }}</p>
                    <a href="{{ route('areas') }}" class="btn btn-moly-gold-outline w-100">
                        <i class="bi bi-map me-2"></i>@lang('messages.nav.areas')
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal-delay-3">
                <div class="contact-card h-100 text-center p-4 p-lg-5">
                    <div class="contact-icon mb-4 gold-text"><i class="bi bi-clock"></i></div>
                    <h4 class="contact-title mb-3">@lang('messages.contact.hours_title')</h4>
                    <p class="contact-detail mb-4">
                        Daily<br>10:00 AM - 11:00 PM
                    </p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#bookingModal"
                       class="btn btn-moly-gold w-100">
                        <i class="bi bi-calendar-check me-2"></i>@lang('messages.nav.book_now')
                    </a>
                </div>
            </div>
        </div>

        <div class="contact-cta-box text-center mt-5 p-4 p-lg-5 reveal-delay-2">
            <h3 class="mb-3">Fastest Response via WhatsApp</h3>
            <p class="mb-4">For the quickest reply, send us a message on WhatsApp. We typically respond within minutes during operating hours.</p>
            <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer"
               class="btn btn-moly-gold btn-lg">
                <i class="bi bi-whatsapp me-2"></i>
                @lang('messages.contact.cta')
            </a>
        </div>
    </div>
</section>

<script>
window.MOLY_SERVICES = [];
</script>

@endsection
