@extends('layouts.app')

@section('content')

<section class="page-hero py-5 py-lg-6 page-hero-faq position-relative">
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <nav aria-label="breadcrumb" class="mb-4 d-flex justify-content-center">
                    <ol class="breadcrumb moly-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('messages.nav.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.nav.faq')</li>
                    </ol>
                </nav>
                <span class="section-label gold-text mb-3 d-block">
                    <i class="bi bi-dash-lg me-2"></i>@lang('messages.nav.faq')<i class="bi bi-dash-lg ms-2"></i>
                </span>
                <h1 class="page-title mb-4">@lang('messages.faq.title')</h1>
                <p class="page-subtitle mx-auto">@lang('messages.faq.subtitle')</p>
            </div>
        </div>
    </div>
</section>

<section class="moly-section py-5 py-lg-6">
    <div class="container">
        <div class="accordion faq-accordion mx-auto" id="faqAccordion">
            @foreach($faqs as $idx => $faq)
                @include('partials.faq-item', ['faq' => $faq, 'index' => $idx])
            @endforeach
        </div>
    </div>
</section>

<section class="moly-section py-5 py-lg-6 cta-section">
    <div class="container">
        <div class="cta-wrapper text-center reveal">
            <h2 class="cta-title mb-4">Still Have Questions?</h2>
            <p class="cta-subtitle mx-auto mb-5">
                Reach out to us on WhatsApp and our team will be happy to assist with any enquiry.
            </p>
            <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer"
               class="btn btn-moly-gold btn-lg cta-wa-btn">
                <i class="bi bi-whatsapp me-2"></i>
                @lang('messages.contact.cta')
            </a>
        </div>
    </div>
</section>

@endsection
