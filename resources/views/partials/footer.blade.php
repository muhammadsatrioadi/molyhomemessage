<footer class="moly-footer pt-5 pb-4">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="footer-brand mb-3">
                    <span class="brand-primary">MOLY</span>
                    <span class="brand-secondary">HOME MASSAGE</span>
                </div>
                <p class="footer-text mb-3">@lang('messages.footer.about_text')</p>
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

            <div class="col-md-6 col-lg-3">
                <h5 class="footer-title">@lang('messages.footer.services_title')</h5>
                <ul class="footer-links list-unstyled mb-0">
                    @if(isset($services))
                        @foreach($services as $svc)
                            <li><a href="{{ route('services') }}#service-{{ $svc->slug }}">{{ $svc->name }}</a></li>
                        @endforeach
                    @else
                        <li><a href="{{ route('services') }}">Balinese Massage</a></li>
                        <li><a href="{{ route('services') }}">Deep Tissue Massage</a></li>
                        <li><a href="{{ route('services') }}">Thai Massage</a></li>
                        <li><a href="{{ route('services') }}">Foot Massage</a></li>
                        <li><a href="{{ route('services') }}">Body Scrub</a></li>
                    @endif
                </ul>
            </div>

            <div class="col-md-6 col-lg-3">
                <h5 class="footer-title">@lang('messages.footer.areas_title')</h5>
                <ul class="footer-links list-unstyled mb-0">
                    @if(isset($areas))
                        @foreach($areas as $area)
                            <li>{{ $area->name }}</li>
                        @endforeach
                    @else
                        <li>KLCC</li>
                        <li>Bukit Bintang</li>
                        <li>KL Sentral</li>
                        <li>Bangsar</li>
                        <li>Mont Kiara</li>
                        <li>Damansara</li>
                    @endif
                </ul>
            </div>

            <div class="col-md-6 col-lg-3">
                <h5 class="footer-title">@lang('messages.footer.contact_title')</h5>
                <ul class="footer-contact list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="bi bi-envelope me-2"></i>
                        <span>@lang('messages.footer.email_label'):</span>
                        <a href="mailto:{{ config('moly.business.email') }}">{{ config('moly.business.email') }}</a>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-whatsapp me-2"></i>
                        <span>@lang('messages.footer.whatsapp_label'):</span>
                        <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer">
                            {{ whatsapp_number_formatted() }}
                        </a>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-geo-alt me-2"></i>
                        <span>@lang('messages.footer.location_label'):</span>
                        {{ config('moly.business.location') }}
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-clock me-2"></i>
                        <span>@lang('messages.footer.hours_title'):</span>
                        10:00 - 23:00
                    </li>
                </ul>
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
