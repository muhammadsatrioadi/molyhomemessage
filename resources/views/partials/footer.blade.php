<footer class="moly-footer pt-5 pb-0">
    <div class="container footer-main-grid pb-4">
        <div class="row g-4 g-lg-5 mb-5">
            <div class="col-md-6 col-lg-6">
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

            <div class="col-md-6 col-lg-6">
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
