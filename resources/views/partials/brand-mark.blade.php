@php
    $brandPrimary = config('moly.brand.primary', 'MOLLY');
    $brandSecondary = config('moly.brand.secondary', 'KL HOME MASSAGE');
@endphp
<img src="{{ versioned_asset('assets/images/LOGO.png') }}" alt="MOLLY Logo" class="brand-logo-img">
<span class="brand-text-wrapper">
    <span class="brand-primary font-display">{{ $brandPrimary }}</span>
    <span class="brand-secondary">{{ $brandSecondary }}</span>
</span>
