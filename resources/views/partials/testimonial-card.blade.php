<div class="card testimonial-card h-100 reveal">
    <div class="card-body p-4 p-lg-5">
        <div class="testimonial-stars mb-3 gold-text">
            @for($i = 1; $i <= 5; $i++)
                @if($i <= $testimonial->rating)
                    <i class="bi bi-star-fill"></i>
                @else
                    <i class="bi bi-star"></i>
                @endif
            @endfor
        </div>
        <p class="testimonial-content mb-4 font-display-italic">
            "{{ $testimonial->content }}"
        </p>
        <div class="testimonial-author d-flex align-items-center">
            <div class="testimonial-avatar d-flex align-items-center justify-content-center me-3">
                <span>{{ strtoupper(substr($testimonial->name, 0, 1)) }}</span>
            </div>
            <div>
                <h5 class="testimonial-name mb-0 font-display">{{ $testimonial->name }}</h5>
                <span class="testimonial-role">Valued Client</span>
            </div>
        </div>
    </div>
</div>
