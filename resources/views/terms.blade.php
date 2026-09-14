@extends('layouts.app')

@section('content')

<section class="legal-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb moly-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('messages.nav.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.footer.terms_conditions')</li>
                    </ol>
                </nav>

                <h1>@lang('messages.footer.terms_conditions')</h1>
                <p class="text-muted mb-5">Last updated: 14 September 2026</p>

                <h2>1. Acceptance of Terms</h2>
                <p>
                    By accessing or using the MOLY HOME MASSAGE website, booking a service, or contacting our team,
                    you agree to be bound by these Terms and Conditions. If you do not agree to any part of these
                    terms, please do not use our services.
                </p>
                <p>
                    These Terms are governed by the laws of Malaysia and are subject to the exclusive jurisdiction
                    of the courts of Kuala Lumpur, Malaysia.
                </p>

                <h2>2. Services Provided</h2>
                <p>
                    MOLY HOME MASSAGE offers professional outcall wellness and massage services delivered at the
                    customer's home, hotel, apartment, or residence within selected areas of Kuala Lumpur. Our
                    services include:
                </p>
                <ul>
                    <li>Balinese Massage</li>
                    <li>Deep Tissue Massage</li>
                    <li>Thai Massage</li>
                    <li>Foot Massage (Standard and Deep Pressure)</li>
                    <li>Body Scrub</li>
                </ul>
                <p>
                    All services are wellness and relaxation oriented. Our services are not a substitute for
                    medical treatment, and we do not diagnose or treat medical conditions.
                </p>

                <h2>3. Bookings and Appointments</h2>
                <ul>
                    <li>Bookings are confirmed via WhatsApp after you submit your details through our website form or contact us directly.</li>
                    <li>We recommend booking at least 2–3 hours in advance for same-day appointments and 1–2 days in advance for weekends or peak periods.</li>
                    <li>After confirmation, any change of date, time, duration, or location should be communicated via WhatsApp as early as possible.</li>
                    <li>Customers must be present at the agreed location at the scheduled start time.</li>
                </ul>

                <h2>4. Service Areas and Location</h2>
                <p>
                    Services are currently available only within selected areas of Kuala Lumpur, including KLCC,
                    Bukit Bintang, KL Sentral, Bangsar, Mont Kiara, Sri Hartamas, Ampang, Damansara, Setapak,
                    and Cheras. Availability in other areas must be confirmed with us prior to booking. We reserve
                    the right to decline bookings for locations outside our active service areas.
                </p>

                <h2>5. Pricing and Payment</h2>
                <ul>
                    <li>All prices are stated in Malaysian Ringgit (RM) and are inclusive of service provision to the customer's location within our standard coverage areas.</li>
                    <li>Prices for each service and duration are as listed on our website at the time of booking.</li>
                    <li>Payment is typically settled at the conclusion of the service, via cash or agreed electronic methods confirmed during booking.</li>
                    <li>Any additional charges, such as special travel requests, will be discussed and confirmed in advance.</li>
                </ul>

                <h2>6. Cancellations and Rescheduling</h2>
                <ul>
                    <li>Customers may cancel or reschedule appointments without charge provided reasonable notice is given.</li>
                    <li>Repeated last-minute cancellations or no-shows may affect future booking eligibility.</li>
                    <li>If a therapist has already been dispatched and the customer cancels or is unreachable at the scheduled time, a cancellation or travel fee may reasonably apply.</li>
                </ul>

                <h2>7. Customer Responsibilities</h2>
                <ul>
                    <li>Provide accurate booking information including service type, duration, date, time, and complete location address.</li>
                    <li>Ensure a safe, hygienic, private, and suitable environment (for example, adequate space, towels, and ventilation) for the therapist to perform the service.</li>
                    <li>Inform our team of any medical conditions, injuries, allergies, or sensitivities prior to the service, so that we can assess suitability and adjust techniques where appropriate.</li>
                    <li>Be present and ready at the scheduled time. Any delay caused by the customer may reduce the service duration without price adjustment at our discretion.</li>
                </ul>

                <h2>8. Professional Conduct and Suitability</h2>
                <ul>
                    <li>All therapists are engaged with the expectation of professional, respectful conduct.</li>
                    <li>Our services are professional wellness and relaxation treatments. Any request that is inappropriate, sexual, or unprofessional will be declined immediately and the session may be terminated without refund.</li>
                    <li>Customers must be aged 18 or above, or if younger, must be accompanied by a parent or legal guardian who remains present and consents in writing.</li>
                </ul>

                <h2>9. Limitation of Liability</h2>
                <p>
                    Our services are provided on a best-effort basis. Within the fullest extent permitted by
                    Malaysian law:
                </p>
                <ul>
                    <li>We are not liable for any indirect, incidental, or consequential damages arising from your use of our website or services.</li>
                    <li>Our aggregate liability for any claim shall not exceed the total amount actually paid by you for the specific service that gave rise to the claim.</li>
                    <li>We are not responsible for any personal property left unattended during service at your premises.</li>
                </ul>
                <p>
                    Nothing in these Terms seeks to exclude or limit liability for death or personal injury caused by
                    our proven negligence, or any other liability that cannot be lawfully excluded.
                </p>

                <h2>10. Website Content</h2>
                <ul>
                    <li>The content on our website is provided for general information purposes only. While we aim to keep information accurate and up to date, we do not guarantee the completeness or accuracy of any content.</li>
                    <li>All brand names, logos, and original content are the property of MOLY HOME MASSAGE. Reproduction without permission is prohibited.</li>
                </ul>

                <h2>11. Intellectual Property</h2>
                <p>
                    All intellectual property rights in the website design, text, images, branding, logos, and
                    service descriptions are owned by or licensed to MOLY HOME MASSAGE. You may not reproduce,
                    distribute, or create derivative works from any of our materials without prior written consent.
                </p>

                <h2>12. Force Majeure</h2>
                <p>
                    We shall not be liable for any failure or delay in performing our obligations where such failure
                    or delay is due to causes beyond our reasonable control, including but not limited to severe
                    weather, road closures, public health emergencies, or governmental restrictions in Malaysia.
                </p>

                <h2>13. Amendments</h2>
                <p>
                    We may update these Terms and Conditions from time to time to reflect changes in our operations
                    or regulatory requirements. The latest version will always be posted on this page with the
                    effective date at the top.
                </p>

                <h2>14. Contact</h2>
                <p>
                    For any questions, complaints, or feedback regarding these Terms and Conditions, please reach
                    out to us at:
                </p>
                <ul>
                    <li>Email: <a href="mailto:{{ config('moly.business.email') }}">{{ config('moly.business.email') }}</a></li>
                    <li>WhatsApp: <a href="{{ whatsapp_contact_url() }}" target="_blank" rel="noopener noreferrer">{{ whatsapp_number_formatted() }}</a></li>
                    <li>Location: {{ config('moly.business.location') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script>window.MOLY_SERVICES = [];</script>

@endsection
