<nav id="moly-navbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}" aria-label="MOLY HOME MASSAGE Home">
            <span class="brand-primary">MOLY</span>
            <span class="brand-secondary">HOME MASSAGE</span>
        </a>

        <button class="navbar-toggler moly-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#molyNavMenu" aria-controls="molyNavMenu"
                aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>

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

            <div class="d-flex align-items-center gap-2 gap-lg-3 ms-lg-3">
                <div class="lang-switcher d-flex align-items-center small" role="group" aria-label="Language switcher">
                    <a href="{{ route('language', ['locale' => 'en']) }}"
                       class="lang-link {{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
                    <span class="lang-divider">|</span>
                    <a href="{{ route('language', ['locale' => 'ms']) }}"
                       class="lang-link {{ app()->getLocale() === 'ms' ? 'active' : '' }}">BM</a>
                </div>
                <a href="#" class="btn btn-moly-gold book-nav-btn"
                   data-bs-toggle="modal" data-bs-target="#bookingModal"
                   aria-label="Book Now">
                    @lang('messages.nav.book_now')
                </a>
            </div>
        </div>
    </div>
</nav>
