<div class="card service-card h-100 reveal">
    <div class="service-card-image">
        <img src="{{ $service->image ?? '/assets/images/service-placeholder.jpg' }}"
             alt="{{ $service->name }} - professional massage service"
             class="card-img-top"
             loading="lazy">
        <div class="service-card-overlay"></div>
        @if($service->prices->count() > 0)
            <div class="service-from-badge">
                {{ config('moly.currency') }}{{ number_format($service->lowest_price, 0) }}
            </div>
        @endif
    </div>
    <div class="card-body p-4">
        <h3 class="card-title service-title mb-3">{{ $service->name }}</h3>
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
                class="btn btn-moly-gold w-100 book-service-btn"
                data-bs-toggle="modal"
                data-bs-target="#bookingModal"
                data-service-id="{{ $service->id }}"
                data-service-name="{{ $service->name }}"
                data-service-slug="{{ $service->slug }}"
                data-price-ids="{{ $service->prices->pluck('id')->join(',') }}"
                data-price-durations="{{ $service->prices->pluck('duration')->join(',') }}"
                data-price-values="{{ $service->prices->pluck('price')->join(',') }}">
            <i class="bi bi-calendar-check me-2"></i>
            @lang('messages.services.book_now')
        </button>
    </div>
</div>
