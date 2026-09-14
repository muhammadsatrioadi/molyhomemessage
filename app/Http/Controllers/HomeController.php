<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceArea;
use App\Models\Testimonial;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::with('prices')->active()->get();
        $areas = ServiceArea::active()->get();
        $testimonials = Testimonial::active()->get();
        $faqs = Faq::active()->get();

        $seo = [
            'title' => config('moly.seo.default_title'),
            'description' => config('moly.seo.default_description'),
            'robots' => config('moly.seo.robots'),
            'canonical' => route('home'),
            'og_type' => 'website',
            'og_title' => config('moly.seo.default_title'),
            'og_description' => config('moly.seo.default_description'),
            'og_image' => asset('/assets/images/og-image.jpg'),
            'og_url' => route('home'),
            'twitter_card' => config('moly.seo.twitter_card'),
            'twitter_title' => config('moly.seo.default_title'),
            'twitter_description' => config('moly.seo.default_description'),
            'twitter_image' => asset('/assets/images/og-image.jpg'),
        ];

        $jsonLd = $this->buildJsonLd($services, $faqs);

        return view('home', compact('services', 'areas', 'testimonials', 'faqs', 'seo', 'jsonLd'));
    }

    public function services()
    {
        $services = Service::with('prices')->active()->get();

        $seo = [
            'title' => __('messages.services.title') . ' | ' . config('moly.business.name'),
            'description' => 'Discover our premium massage services including Balinese, Deep Tissue, Thai, Foot Massage and Body Scrub in Kuala Lumpur.',
            'robots' => 'index, follow',
            'canonical' => route('services'),
            'og_type' => 'website',
            'og_title' => __('messages.services.title') . ' | ' . config('moly.business.name'),
            'og_description' => 'Discover our premium massage services including Balinese, Deep Tissue, Thai, Foot Massage and Body Scrub in Kuala Lumpur.',
            'og_image' => asset('/assets/images/og-image.jpg'),
            'og_url' => route('services'),
            'twitter_card' => 'summary_large_image',
            'twitter_title' => __('messages.services.title') . ' | ' . config('moly.business.name'),
            'twitter_description' => 'Discover our premium massage services including Balinese, Deep Tissue, Thai, Foot Massage and Body Scrub in Kuala Lumpur.',
            'twitter_image' => asset('/assets/images/og-image.jpg'),
        ];

        return view('services', compact('services', 'seo'));
    }

    public function about()
    {
        $seo = [
            'title' => __('messages.nav.about') . ' | ' . config('moly.business.name'),
            'description' => 'MOLY HOME MASSAGE provides convenient home and hotel massage services for customers across selected areas of Kuala Lumpur.',
            'robots' => 'index, follow',
            'canonical' => route('about'),
            'og_type' => 'website',
            'og_title' => __('messages.nav.about') . ' | ' . config('moly.business.name'),
            'og_description' => 'MOLY HOME MASSAGE provides convenient home and hotel massage services for customers across selected areas of Kuala Lumpur.',
            'og_image' => asset('/assets/images/og-image.jpg'),
            'og_url' => route('about'),
            'twitter_card' => 'summary_large_image',
            'twitter_title' => __('messages.nav.about') . ' | ' . config('moly.business.name'),
            'twitter_description' => 'MOLY HOME MASSAGE provides convenient home and hotel massage services for customers across selected areas of Kuala Lumpur.',
            'twitter_image' => asset('/assets/images/og-image.jpg'),
        ];

        return view('about', compact('seo'));
    }

    public function areas()
    {
        $areas = ServiceArea::active()->get();

        $seo = [
            'title' => __('messages.nav.areas') . ' | ' . config('moly.business.name'),
            'description' => 'MOLY HOME MASSAGE service areas in Kuala Lumpur including KLCC, Bukit Bintang, KL Sentral, Bangsar, Mont Kiara, Sri Hartamas, Ampang, Damansara, Setapak and Cheras.',
            'robots' => 'index, follow',
            'canonical' => route('areas'),
            'og_type' => 'website',
            'og_title' => __('messages.nav.areas') . ' | ' . config('moly.business.name'),
            'og_description' => 'MOLY HOME MASSAGE service areas in Kuala Lumpur including KLCC, Bukit Bintang, KL Sentral, Bangsar, Mont Kiara, Sri Hartamas, Ampang, Damansara, Setapak and Cheras.',
            'og_image' => asset('/assets/images/og-image.jpg'),
            'og_url' => route('areas'),
            'twitter_card' => 'summary_large_image',
            'twitter_title' => __('messages.nav.areas') . ' | ' . config('moly.business.name'),
            'twitter_description' => 'MOLY HOME MASSAGE service areas in Kuala Lumpur.',
            'twitter_image' => asset('/assets/images/og-image.jpg'),
        ];

        return view('areas', compact('areas', 'seo'));
    }

    public function faq()
    {
        $faqs = Faq::active()->get();

        $seo = [
            'title' => __('messages.nav.faq') . ' | ' . config('moly.business.name'),
            'description' => 'Frequently asked questions about MOLY HOME MASSAGE services, booking, areas and payment.',
            'robots' => 'index, follow',
            'canonical' => route('faq'),
            'og_type' => 'website',
            'og_title' => __('messages.nav.faq') . ' | ' . config('moly.business.name'),
            'og_description' => 'Frequently asked questions about MOLY HOME MASSAGE services, booking, areas and payment.',
            'og_image' => asset('/assets/images/og-image.jpg'),
            'og_url' => route('faq'),
            'twitter_card' => 'summary_large_image',
            'twitter_title' => __('messages.nav.faq') . ' | ' . config('moly.business.name'),
            'twitter_description' => 'Frequently asked questions about MOLY HOME MASSAGE services, booking, areas and payment.',
            'twitter_image' => asset('/assets/images/og-image.jpg'),
        ];

        return view('faq', compact('faqs', 'seo'));
    }

    public function contact()
    {
        $seo = [
            'title' => __('messages.nav.contact') . ' | ' . config('moly.business.name'),
            'description' => 'Contact MOLY HOME MASSAGE via WhatsApp or email for bookings and enquiries in Kuala Lumpur.',
            'robots' => 'index, follow',
            'canonical' => route('contact'),
            'og_type' => 'website',
            'og_title' => __('messages.nav.contact') . ' | ' . config('moly.business.name'),
            'og_description' => 'Contact MOLY HOME MASSAGE via WhatsApp or email for bookings and enquiries in Kuala Lumpur.',
            'og_image' => asset('/assets/images/og-image.jpg'),
            'og_url' => route('contact'),
            'twitter_card' => 'summary_large_image',
            'twitter_title' => __('messages.nav.contact') . ' | ' . config('moly.business.name'),
            'twitter_description' => 'Contact MOLY HOME MASSAGE via WhatsApp or email for bookings and enquiries in Kuala Lumpur.',
            'twitter_image' => asset('/assets/images/og-image.jpg'),
        ];

        return view('contact', compact('seo'));
    }

    public function language(Request $request, $locale)
    {
        $allowedLocales = ['en', 'ms'];

        if (in_array($locale, $allowedLocales)) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }

        return redirect()->back();
    }

    public function privacy()
    {
        $seo = [
            'title' => 'Privacy Policy | ' . config('moly.business.name'),
            'description' => 'Privacy Policy for MOLY HOME MASSAGE.',
            'robots' => 'noindex, follow',
            'canonical' => route('privacy'),
        ];
        return view('privacy', compact('seo'));
    }

    public function terms()
    {
        $seo = [
            'title' => 'Terms & Conditions | ' . config('moly.business.name'),
            'description' => 'Terms and Conditions for MOLY HOME MASSAGE.',
            'robots' => 'noindex, follow',
            'canonical' => route('terms'),
        ];
        return view('terms', compact('seo'));
    }

    private function buildJsonLd($services, $faqs): array
    {
        $localBusiness = [
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => config('moly.business.name'),
            'description' => config('moly.site.description'),
            'image' => asset('/assets/images/og-image.jpg'),
            '@id' => route('home'),
            'url' => route('home'),
            'telephone' => whatsapp_number_formatted(),
            'email' => config('moly.business.email'),
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Kuala Lumpur',
                'addressCountry' => 'MY',
            ],
            'areaServed' => [
                '@type' => 'City',
                'name' => 'Kuala Lumpur, Malaysia',
            ],
            'priceRange' => 'RM70 - RM370',
            'openingHoursSpecification' => [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => [
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday',
                    'Sunday',
                ],
                'opens' => '10:00',
                'closes' => '23:00',
            ],
        ];

        $serviceSchema = [];
        foreach ($services as $service) {
            $offers = [];
            foreach ($service->prices as $price) {
                $offers[] = [
                    '@type' => 'Offer',
                    'priceCurrency' => 'MYR',
                    'price' => (string)$price->price,
                    'description' => $price->duration . ' minutes session',
                ];
            }
            $serviceSchema[] = [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'serviceType' => $service->name,
                'name' => $service->name,
                'description' => $service->description,
                'provider' => [
                    '@type' => 'LocalBusiness',
                    'name' => config('moly.business.name'),
                ],
                'areaServed' => 'Kuala Lumpur, Malaysia',
                'hasOfferCatalog' => [
                    '@type' => 'OfferCatalog',
                    'name' => $service->name . ' Prices',
                    'itemListElement' => $offers,
                ],
            ];
        }

        $faqMainEntity = [];
        foreach ($faqs as $faq) {
            $faqMainEntity[] = [
                '@type' => 'Question',
                'name' => $faq->localized_question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq->localized_answer,
                ],
            ];
        }
        $faqPage = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faqMainEntity,
        ];

        return [
            'localBusiness' => $localBusiness,
            'services' => $serviceSchema,
            'faqPage' => $faqPage,
        ];
    }
}
