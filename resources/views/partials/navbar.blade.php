<nav id="moly-navbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}" aria-label="{{ config('moly.business.name') }} Home">
            @include('partials.brand-mark')
        </a>

        <div class="mobile-nav-controls d-lg-none">
            <button class="navbar-toggler moly-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#molyNavMenu" aria-controls="molyNavMenu"
                    aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="molyNavMenu">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">@lang('messages.nav.home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}"
                       href="{{ route('services') }}">@lang('messages.nav.services')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                       href="{{ route('about') }}">@lang('messages.nav.about')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('areas') ? 'active' : '' }}"
                       href="{{ route('areas') }}">@lang('messages.nav.areas')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('faq') ? 'active' : '' }}"
                       href="{{ route('faq') }}">@lang('messages.nav.faq')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                       href="{{ route('contact') }}">@lang('messages.nav.contact')</a>
                </li>
            </ul>

            <div class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center gap-2 gap-lg-3 ms-lg-3 navbar-right-stack">
                <div class="navbar-no-sex-wrap d-flex justify-content-center justify-content-lg-start order-2 order-lg-0">
                    <span class="no-sex-badge small d-inline-flex align-items-center">
                        <i class="bi bi-shield-check me-1"></i>
                        @lang('messages.policy.no_sex_short')
                    </span>
                </div>
                <div class="d-flex align-items-center justify-content-between justify-content-lg-start gap-2 gap-lg-3 order-1 order-lg-0">
                    <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer"
                       class="btn btn-moly-gold book-nav-btn d-inline-flex align-items-center"
                       aria-label="Book Now">
                        <i class="bi bi-whatsapp me-1"></i>
                        @lang('messages.nav.book_now')
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
