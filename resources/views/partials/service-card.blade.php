@php
    $categoryMap = [
        'full-body-back-massage' => ['label' => __('messages.services.category_classic'), 'class' => 'tag-classic'],
        'head-neck-massage' => ['label' => __('messages.services.category_classic'), 'class' => 'tag-classic'],
        'traditional-massage' => ['label' => __('messages.services.category_signature'), 'class' => 'tag-signature'],
        'aromatherapy-massage' => ['label' => __('messages.services.category_signature'), 'class' => 'tag-signature'],
        'balinese-massage' => ['label' => __('messages.services.category_signature'), 'class' => 'tag-signature'],
        'swedish-massage' => ['label' => __('messages.services.category_signature'), 'class' => 'tag-signature'],
        'deep-tissue-massage' => ['label' => __('messages.services.category_signature'), 'class' => 'tag-signature'],
        'thai-massage' => ['label' => __('messages.services.category_signature'), 'class' => 'tag-signature'],
        'foot-massage-standard' => ['label' => __('messages.services.category_classic'), 'class' => 'tag-classic'],
        'foot-massage-deep-pressure' => ['label' => __('messages.services.category_classic'), 'class' => 'tag-classic'],
        'couples-shared-session' => ['label' => __('messages.services.category_couples'), 'class' => 'tag-couples'],
        'body-scrub' => ['label' => __('messages.services.category_addon'), 'class' => 'tag-addon'],
    ];
    $cat = $categoryMap[$service->slug] ?? ['label' => __('messages.services.category_signature'), 'class' => 'tag-signature'];
@endphp
<div class="card service-card h-100 reveal">
    <div class="service-card-image">
        <img src="{{ $service->image_url }}"
             alt="{{ $service->name }}"
             class="card-img-top"
             loading="lazy"
             decoding="async"
             onerror="this.onerror=null;this.src='{{ asset('assets/images/service-placeholder.jpg') }}';">
        <div class="service-card-overlay"></div>
        <div class="service-category-tag {{ $cat['class'] }}">{{ $cat['label'] }}</div>
        @if($service->prices->count() > 0)
            <div class="service-from-badge">
                <span class="from-label">@lang('messages.services.from')</span>
                <span class="from-price">{{ config('moly.currency') }}{{ number_format($service->lowest_price, 0) }}</span>
            </div>
        @endif
    </div>
    <div class="card-body p-4">
        <h3 class="card-title service-title font-display mb-3">{{ $service->name }}</h3>
        <p class="card-text service-description mb-4">{{ $service->description }}</p>

        <div class="service-prices-list mb-4">
            @foreach($service->prices as $price)
                <div class="service-price-row d-flex justify-content-between align-items-center py-2">
                    <span class="service-duration">{{ $price->duration }} MIN</span>
                    <span class="service-price">{{ config('moly.currency') }}{{ number_format($price->price, 0) }}</span>
                </div>
            @endforeach
        </div>

        <button type="button"
                class="btn btn-moly-gold w-100 book-service-btn d-inline-flex align-items-center justify-content-center"
                data-bs-toggle="modal"
                data-bs-target="#bookingModal"
                data-service-id="{{ $service->id }}"
                data-service-name="{{ $service->name }}"
                data-service-slug="{{ $service->slug }}"
                data-price-ids="{{ $service->prices->pluck('id')->join(',') }}"
                data-price-durations="{{ $service->prices->pluck('duration')->join(',') }}"
                data-price-values="{{ $service->prices->pluck('price')->join(',') }}">
            <i class="bi bi-calendar2-check me-2"></i>
            @lang('messages.services.book_now')
        </button>
    </div>
</div>
