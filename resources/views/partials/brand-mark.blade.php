@php
    $brandPrimary = config('moly.brand.primary', 'MOLLY');
    $brandSecondary = config('moly.brand.secondary', 'KL HOME MASSAGE');
@endphp
<span class="brand-primary font-display">{{ $brandPrimary }}</span>
<span class="brand-secondary">{{ $brandSecondary }}</span>
