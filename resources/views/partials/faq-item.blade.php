<div class="accordion-item faq-item reveal">
    <h3 class="accordion-header" id="faqHeading-{{ $index }}">
        <button class="accordion-button collapsed faq-button" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#faqCollapse-{{ $index }}"
                aria-expanded="false"
                aria-controls="faqCollapse-{{ $index }}">
            <span class="faq-question">{{ $faq->localized_question }}</span>
            <i class="bi bi-plus-lg faq-icon-plus"></i>
            <i class="bi bi-dash-lg faq-icon-minus"></i>
        </button>
    </h3>
    <div id="faqCollapse-{{ $index }}"
         class="accordion-collapse collapse"
         aria-labelledby="faqHeading-{{ $index }}"
         data-bs-parent="#faqAccordion">
        <div class="accordion-body faq-body">
            {!! nl2br(e($faq->localized_answer)) !!}
        </div>
    </div>
</div>
