<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content moly-modal">
            <div class="modal-header moly-modal-header border-0">
                <div>
                    <h2 class="modal-title fs-4 font-display" id="bookingModalLabel">
                        <i class="bi bi-spa me-2 gold-text"></i>
                        @lang('messages.booking.modal_title')
                    </h2>
                    <span class="moly-modal-badge mt-2 d-inline-flex align-items-center">
                        <i class="bi bi-geo-alt-fill gold-text me-1"></i>
                        @lang('messages.booking.modal_badge')
                    </span>
                    <div class="mt-2">
                        <span class="no-sex-badge small d-inline-flex align-items-center">
                            <i class="bi bi-shield-check me-1"></i>
                            @lang('messages.policy.no_sex_short')
                        </span>
                    </div>
                </div>
                <button type="button" class="btn-close booking-close-btn" data-bs-dismiss="modal"
                        aria-label="@lang('messages.booking.close')"></button>
            </div>

            <form id="bookingForm" class="booking-form">
                <div class="modal-body p-4 pt-2">
                    <div class="row g-3 g-md-4">
                        <div class="col-md-6">
                            <label for="booking_service" class="form-label booking-label">
                                @lang('messages.booking.massage_label') *
                            </label>
                            <select id="booking_service" name="service" class="form-select booking-select" required>
                                <option value="">@lang('messages.booking.massage_placeholder')</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="booking_duration" class="form-label booking-label">
                                @lang('messages.booking.duration_label') *
                            </label>
                            <select id="booking_duration" name="duration" class="form-select booking-select" required>
                                <option value="">@lang('messages.booking.duration_placeholder')</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="booking_date" class="form-label booking-label">
                                @lang('messages.booking.date_label') *
                            </label>
                            <input type="date" id="booking_date" name="date"
                                   class="form-control booking-input" required>
                        </div>

                        <div class="col-md-6">
                            <label for="booking_time" class="form-label booking-label">
                                @lang('messages.booking.time_label') *
                            </label>
                            <input type="time" id="booking_time" name="time"
                                   class="form-control booking-input" step="900"
                                   min="10:00" max="22:00" required>
                        </div>

                        <div class="col-12">
                            <label for="booking_location" class="form-label booking-label">
                                @lang('messages.booking.location_label') *
                            </label>
                            <textarea id="booking_location" name="location"
                                      class="form-control booking-input booking-textarea"
                                      rows="3"
                                      placeholder="@lang('messages.booking.location_placeholder')"
                                      required></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer moly-modal-footer border-0 flex-column flex-sm-row gap-3 pt-0">
                    <button type="button" class="btn btn-outline-secondary moly-outline-btn flex-grow-1"
                            data-bs-dismiss="modal">
                        @lang('messages.booking.close')
                    </button>
                    <button type="submit" class="btn btn-whatsapp booking-submit-btn flex-grow-1 d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-whatsapp me-2"></i>
                        @lang('messages.booking.submit')
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
