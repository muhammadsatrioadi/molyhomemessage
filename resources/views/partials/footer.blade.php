<footer class="moly-footer pt-5 pb-0">
    <div class="footer-image-strip d-none d-lg-block">
        <img src="{{ asset('assets/images/section-footer-banner.jpg') }}"
             alt="{{ config('moly.business.name') }} premium wellness banner"
             loading="lazy"
             decoding="async">
        <div class="footer-image-overlay"></div>
    </div>

    <div class="container footer-main-grid pt-lg-0 pb-4">
        <div class="row g-4 g-lg-5 mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="footer-brand-card h-100">
                    <div class="footer-brand mb-3">
                        @include('partials.brand-mark')
                    </div>
                    <p class="footer-text mb-3">@lang('messages.footer.about_text')</p>
                    <div class="footer-badge-row d-flex flex-wrap gap-2 mb-3">
                        <span class="no-sex-badge-inverse small d-inline-flex align-items-center">
                            <i class="bi bi-shield-check me-1"></i>
                            @lang('messages.footer.no_sex_badge')
                        </span>
                    </div>
                    @if(!empty(config('moly.social.facebook')) || !empty(config('moly.social.instagram')))
                        <div class="footer-social d-flex gap-3">
                            @if(!empty(config('moly.social.facebook')))
                                <a href="{{ config('moly.social.facebook') }}" target="_blank" rel="noopener noreferrer"
                                   aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                            @endif
                            @if(!empty(config('moly.social.instagram')))
                                <a href="{{ config('moly.social.instagram') }}" target="_blank" rel="noopener noreferrer"
                                   aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <h5 class="footer-title font-display">@lang('messages.footer.services_title')</h5>
                <ul class="footer-links list-unstyled mb-0">
                    @if(isset($services))
                        @foreach($services->take(8) as $svc)
                            <li><a href="{{ route('services') }}#service-{{ $svc->slug }}">{{ $svc->name }}</a></li>
                        @endforeach
                    @else
                        <li><a href="{{ route('services') }}">Full Body Back Massage</a></li>
                        <li><a href="{{ route('services') }}">Head & Neck Massage</a></li>
                        <li><a href="{{ route('services') }}">Balinese Massage</a></li>
                        <li><a href="{{ route('services') }}">Deep Tissue Massage</a></li>
                        <li><a href="{{ route('services') }}">Swedish Massage</a></li>
                        <li><a href="{{ route('services') }}">Traditional Massage</a></li>
                        <li><a href="{{ route('services') }}">Aromatherapy Massage</a></li>
                        <li><a href="{{ route('services') }}">Couples / Shared Session</a></li>
                    @endif
                </ul>
            </div>

            <div class="col-md-6 col-lg-3">
                <h5 class="footer-title font-display">@lang('messages.footer.areas_title')</h5>
                <ul class="footer-links list-unstyled mb-0">
                    @if(isset($areas))
                        @foreach($areas->take(12) as $area)
                            <li><i class="bi bi-geo-alt-fill gold-text me-2 small"></i>{{ $area->name }}</li>
                        @endforeach
                        @if($areas->count() > 12)
                            <li><a href="{{ route('areas') }}" class="gold-text">+ {{ $areas->count() - 12 }} more areas <i class="bi bi-arrow-right ms-1"></i></a></li>
                        @endif
                    @else
                        <li><i class="bi bi-geo-alt-fill gold-text me-2 small"></i>KLCC</li>
                        <li><i class="bi bi-geo-alt-fill gold-text me-2 small"></i>Bukit Bintang</li>
                        <li><i class="bi bi-geo-alt-fill gold-text me-2 small"></i>Bukit Tunku</li>
                        <li><i class="bi bi-geo-alt-fill gold-text me-2 small"></i>Chowkit</li>
                        <li><i class="bi bi-geo-alt-fill gold-text me-2 small"></i>Medan Tuanku</li>
                        <li><i class="bi bi-geo-alt-fill gold-text me-2 small"></i>Pudu</li>
                        <li><i class="bi bi-geo-alt-fill gold-text me-2 small"></i>TRX</li>
                        <li><i class="bi bi-geo-alt-fill gold-text me-2 small"></i>KL Sentral</li>
                        <li><i class="bi bi-geo-alt-fill gold-text me-2 small"></i>Bangsar</li>
                        <li><i class="bi bi-geo-alt-fill gold-text me-2 small"></i>Mont Kiara</li>
                        <li><i class="bi bi-geo-alt-fill gold-text me-2 small"></i>Damansara</li>
                        <li><a href="{{ route('areas') }}" class="gold-text">All coverage areas <i class="bi bi-arrow-right ms-1"></i></a></li>
                    @endif
                </ul>
            </div>

            <div class="col-md-6 col-lg-3">
                <h5 class="footer-title font-display">@lang('messages.footer.contact_title')</h5>
                <ul class="footer-contact list-unstyled mb-0">
                    <li class="mb-3">
                        <span class="footer-contact-icon"><i class="bi bi-whatsapp"></i></span>
                        <div>
                            <span class="footer-contact-label d-block">@lang('messages.footer.whatsapp_label')</span>
                            <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer" class="footer-contact-value">
                                {{ whatsapp_number_formatted() }}
                            </a>
                        </div>
                    </li>
                    <li class="mb-3">
                        <span class="footer-contact-icon"><i class="bi bi-envelope"></i></span>
                        <div>
                            <span class="footer-contact-label d-block">@lang('messages.footer.email_label')</span>
                            <a href="mailto:{{ config('moly.business.email') }}" class="footer-contact-value">{{ config('moly.business.email') }}</a>
                        </div>
                    </li>
                    <li class="mb-3">
                        <span class="footer-contact-icon"><i class="bi bi-geo-alt"></i></span>
                        <div>
                            <span class="footer-contact-label d-block">@lang('messages.footer.location_label')</span>
                            <span class="footer-contact-value">{{ config('moly.business.location') }}</span>
                        </div>
                    </li>
                    <li class="mb-3">
                        <span class="footer-contact-icon"><i class="bi bi-clock"></i></span>
                        <div>
                            <span class="footer-contact-label d-block">@lang('messages.footer.hours_title')</span>
                            <span class="footer-contact-value">@lang('messages.footer.hours_value')</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-no-sex-strip">
            <div class="row align-items-center g-3">
                <div class="col-md-auto d-flex align-items-center">
                    <span class="footer-no-sex-icon d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-shield-check"></i>
                    </span>
                    <div class="ms-3">
                        <h6 class="footer-no-sex-title font-display mb-0">@lang('messages.footer.no_sex_badge')</h6>
                        <span class="footer-no-sex-subtitle">@lang('messages.footer.no_sex_title')</span>
                    </div>
                </div>
                <div class="col-md">
                    <p class="footer-no-sex-text mb-0">@lang('messages.footer.no_sex_text')</p>
                </div>
            </div>
        </div>

        <div class="footer-bottom pt-4 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <p class="copyright mb-0">
                @lang('messages.footer.copyright', ['year' => date('Y')])
            </p>
            <div class="footer-legal-links d-flex gap-3">
                <a href="{{ route('privacy') }}">@lang('messages.footer.privacy_policy')</a>
                <a href="{{ route('terms') }}">@lang('messages.footer.terms_conditions')</a>
            </div>
        </div>
    </div>
</footer>
