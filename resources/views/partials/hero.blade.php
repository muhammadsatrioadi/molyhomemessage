<section class="moly-hero position-relative overflow-hidden">
    <div class="hero-overlay"></div>
    <div class="hero-background"></div>

    <div class="container hero-container position-relative">
        <div class="row align-items-center min-hero-height">
            <div class="col-lg-8 col-xl-7">
                <div class="hero-label mb-4 reveal">
                    <span class="badge rounded-pill gold-badge">
                        @lang('messages.hero.label')
                    </span>
                </div>

                <h1 class="hero-headline mb-4 reveal-delay-1">
                    @lang('messages.hero.headline')
                </h1>

                <p class="hero-subheadline mb-5 reveal-delay-2">
                    @lang('messages.hero.subheadline')
                </p>

                <div class="hero-buttons d-flex flex-column flex-sm-row gap-3 reveal-delay-3">
                    <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer"
                       class="btn btn-moly-gold btn-lg hero-cta-wa">
                        <i class="bi bi-whatsapp me-2"></i>
                        @lang('messages.hero.cta_whatsapp')
                    </a>
                    <a href="#services-section" class="btn btn-outline-light btn-lg hero-cta-outline">
                        @lang('messages.hero.cta_services')
                        <i class="bi bi-arrow-down ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-scroll-indicator d-none d-lg-block">
        <i class="bi bi-chevron-double-down"></i>
    </div>
</section>
