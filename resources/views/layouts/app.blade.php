<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">

    <title>{{ $seo['title'] ?? config('moly.seo.default_title') }}</title>
    <meta name="description" content="{{ $seo['description'] ?? config('moly.seo.default_description') }}">
    <meta name="robots" content="{{ $seo['robots'] ?? 'index, follow' }}">
    <link rel="canonical" href="{{ $seo['canonical'] ?? url('/') }}">
    <meta name="keywords" content="{{ config('moly.site.keywords') }}">

    <meta property="og:type" content="{{ $seo['og_type'] ?? 'website' }}">
    <meta property="og:title" content="{{ $seo['og_title'] ?? config('moly.seo.default_title') }}">
    <meta property="og:description" content="{{ $seo['og_description'] ?? config('moly.seo.default_description') }}">
    <meta property="og:image" content="{{ $seo['og_image'] ?? asset('/assets/images/og-image.jpg') }}">
    <meta property="og:url" content="{{ $seo['og_url'] ?? url('/') }}">
    <meta property="og:site_name" content="{{ config('moly.business.name') }}">
    <meta property="og:locale" content="{{ app()->getLocale() === 'ms' ? 'ms_MY' : 'en_MY' }}">

    <meta name="twitter:card" content="{{ $seo['twitter_card'] ?? 'summary_large_image' }}">
    <meta name="twitter:title" content="{{ $seo['twitter_title'] ?? config('moly.seo.default_title') }}">
    <meta name="twitter:description" content="{{ $seo['twitter_description'] ?? config('moly.seo.default_description') }}">
    <meta name="twitter:image" content="{{ $seo['twitter_image'] ?? asset('/assets/images/og-image.jpg') }}">

    <link rel="icon" type="image/svg+xml" href="{{ asset('/assets/images/favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <noscript>
        <link rel="stylesheet" href="{{ asset('/assets/css/moly.css') }}" crossorigin="anonymous">
    </noscript>
    <link rel="stylesheet" href="{{ asset('/assets/css/moly.css') }}" crossorigin="anonymous">

    @if(isset($jsonLd) && isset($jsonLd['localBusiness']))
        <script type="application/ld+json">
            {!! json_encode($jsonLd['localBusiness'], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
    @endif

    @if(isset($jsonLd) && isset($jsonLd['services']))
        @foreach($jsonLd['services'] as $serviceJson)
            <script type="application/ld+json">
                {!! json_encode($serviceJson, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
            </script>
        @endforeach
    @endif

    @if(isset($jsonLd) && isset($jsonLd['faqPage']))
        <script type="application/ld+json">
            {!! json_encode($jsonLd['faqPage'], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
    @endif
</head>
<body class="moly-body">

    @include('partials.navbar')

    <main id="main-content">
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.booking-modal')

    <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer"
       class="floating-whatsapp d-md-none" aria-label="Chat on WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        window.MOLY_WHATSAPP = "{{ config('moly.business.whatsapp', '') }}";
        window.MOLY_BUSINESS_NAME = @json(config('moly.business.name'));
    </script>
    <script src="{{ asset('/assets/js/moly.js') }}"></script>

    @yield('scripts')
</body>
</html>
