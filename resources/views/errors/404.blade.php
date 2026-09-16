<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Page Not Found | {{ config('moly.business.name') }}</title>
    <meta name="robots" content="noindex, follow">
    <link rel="icon" type="image/svg+xml" href="{{ versioned_asset('assets/images/favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ versioned_asset('assets/css/moly.css') }}">
</head>
<body class="moly-body">
    <div class="error-page">
        <div class="container">
            <div class="error-brand">
                @include('partials.brand-mark')
            </div>
            <div class="error-code">404</div>
            <h1 class="error-title">Looks like this page took a wrong turn.</h1>
            <p class="error-text">
                The page you are looking for may have been moved, removed, or perhaps never existed.
                Let us guide you back to relaxation.
            </p>
            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                <a href="{{ route('home') }}" class="btn btn-moly-gold btn-lg">
                    <i class="bi bi-house-door me-2"></i>
                    Back to Home
                </a>
                <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer"
                   class="btn btn-moly-gold-outline btn-lg">
                    <i class="bi bi-whatsapp me-2"></i>
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</body>
</html>
