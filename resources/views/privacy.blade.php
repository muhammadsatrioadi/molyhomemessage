@extends('layouts.app')

@section('content')

<section class="legal-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb moly-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('messages.nav.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.footer.privacy_policy')</li>
                    </ol>
                </nav>

                <h1>@lang('messages.footer.privacy_policy')</h1>
                <p class="text-muted mb-5">Last updated: 14 September 2026</p>

                <h2>1. Introduction</h2>
                <p>
                    MOLY HOME MASSAGE ("we", "us", or "our") is committed to protecting the privacy of our customers
                    and website visitors. This Privacy Policy explains how we collect, use, disclose, and safeguard
                    your information when you visit our website or use our massage booking services in Kuala Lumpur,
                    Malaysia.
                </p>
                <p>
                    We encourage you to read this policy carefully. By using our services or website, you acknowledge
                    that you have read, understood, and agree to the practices described in this policy.
                </p>

                <h2>2. Information We Collect</h2>
                <p>We may collect the following types of information:</p>
                <ul>
                    <li><strong>Contact details:</strong> Your name, email address, and phone or WhatsApp number when you make a booking or enquiry.</li>
                    <li><strong>Booking information:</strong> Service type, duration, preferred date and time, and the hotel or home address where the service will be provided.</li>
                    <li><strong>Payment information:</strong> We do not store full payment card details. Payments are arranged directly at the time of service or via trusted methods confirmed during booking.</li>
                    <li><strong>Communications:</strong> Records of any messages, enquiries, or feedback you send us via WhatsApp, email, or our website.</li>
                    <li><strong>Website usage data:</strong> Basic anonymous analytics such as pages viewed, referring site, and device type, collected to help us improve our website.</li>
                </ul>

                <h2>3. How We Use Your Information</h2>
                <ul>
                    <li>To confirm, schedule, and deliver your requested massage service.</li>
                    <li>To communicate with you regarding your booking, changes, or availability.</li>
                    <li>To respond to your enquiries and provide customer support.</li>
                    <li>To improve our services, website experience, and overall quality.</li>
                    <li>To comply with any applicable legal requirements in Malaysia.</li>
                </ul>
                <p>
                    We do <strong>not</strong> sell, rent, or lease your personal information to third parties for
                    marketing purposes.
                </p>

                <h2>4. Sharing Your Information</h2>
                <p>
                    We only share your information with third parties in the following limited circumstances:
                </p>
                <ul>
                    <li>With our assigned massage therapists, strictly to enable them to attend your scheduled appointment at the correct location and time.</li>
                    <li>With professional advisors (legal, accounting, or technology providers) bound by confidentiality obligations.</li>
                    <li>When required by Malaysian law, a valid court order, or lawful government request.</li>
                </ul>

                <h2>5. Data Retention</h2>
                <p>
                    We retain your personal information only for as long as reasonably necessary to fulfil the
                    purposes outlined in this policy, including maintaining records for accounting, legal, and
                    customer-service purposes. If you would like us to remove your records, please contact us.
                </p>

                <h2>6. Security</h2>
                <p>
                    We take reasonable administrative and technical precautions to protect your personal information
                    against loss, misuse, or unauthorised access. However, no method of electronic storage or
                    transmission over the internet is completely secure, and we cannot guarantee absolute security.
                </p>

                <h2>7. Cookies and Similar Technologies</h2>
                <p>
                    Our website may use basic cookies and local storage to remember your preferred language setting
                    and essential session information. We do not use invasive tracking or advertising cookies. You can
                    disable cookies via your browser settings if you prefer.
                </p>

                <h2>8. Your Rights</h2>
                <p>
                    Under applicable Malaysian law, you may have the right to:
                </p>
                <ul>
                    <li>Request a copy of the personal information we hold about you.</li>
                    <li>Request correction of any inaccurate or incomplete information.</li>
                    <li>Request deletion of your personal data, subject to any lawful retention requirements.</li>
                    <li>Withdraw any consent previously provided for us to process your data.</li>
                </ul>
                <p>
                    To exercise these rights, please contact us via the details provided below.
                </p>

                <h2>9. Children's Privacy</h2>
                <p>
                    Our services are not intended for children under the age of 18 without the presence or
                    consent of a parent or legal guardian. We do not knowingly collect personal information from
                    minors without guardian consent.
                </p>

                <h2>10. Third-Party Links</h2>
                <p>
                    Our website may contain links to third-party websites such as WhatsApp or social media channels.
                    This Privacy Policy applies only to our website and services. We encourage you to read the
                    privacy policies of any third-party sites you visit.
                </p>

                <h2>11. Changes to This Policy</h2>
                <p>
                    We may update this Privacy Policy from time to time to reflect changes in our practices or legal
                    requirements. Any updates will be posted on this page with the revised date above.
                </p>

                <h2>12. Contact Us</h2>
                <p>
                    If you have any questions about this Privacy Policy, your personal information, or our
                    practices, please contact us at:
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
