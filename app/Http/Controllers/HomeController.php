<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceArea;
use App\Models\Testimonial;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use stdClass;

class HomeController extends Controller
{
    public function index()
    {
        $baseServices = Service::with('prices')->active()->get();
        $services = $this->buildTreatments($baseServices);
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
        $baseServices = Service::with('prices')->active()->get();
        $services = $this->buildTreatments($baseServices);

        $seoDescription = config('moly.business.name') . ' offers nine premium outcall massage treatments: Deep Tissue, Balinese Massage, Foot Massage, Hot Stone, Postnatal, Prenatal, Body Scrub, Lomi-Lomi and Thai Massage across Kuala Lumpur.';

        $seo = [
            'title' => __('messages.services.title') . ' | ' . config('moly.business.name'),
            'description' => $seoDescription,
            'robots' => 'index, follow',
            'canonical' => route('services'),
            'og_type' => 'website',
            'og_title' => __('messages.services.title') . ' | ' . config('moly.business.name'),
            'og_description' => $seoDescription,
            'og_image' => asset('/assets/images/og-image.jpg'),
            'og_url' => route('services'),
            'twitter_card' => 'summary_large_image',
            'twitter_title' => __('messages.services.title') . ' | ' . config('moly.business.name'),
            'twitter_description' => $seoDescription,
            'twitter_image' => asset('/assets/images/og-image.jpg'),
        ];

        return view('services', compact('services', 'seo'));
    }

    public function about()
    {
        $seoDescription = config('moly.business.name') . ' provides premium outcall massage services across Kuala Lumpur. Therapist travels to your hotel, residence, apartment or preferred location — making professional relaxation more accessible.';

        $seo = [
            'title' => __('messages.nav.about') . ' | ' . config('moly.business.name'),
            'description' => $seoDescription,
            'robots' => 'index, follow',
            'canonical' => route('about'),
            'og_type' => 'website',
            'og_title' => __('messages.nav.about') . ' | ' . config('moly.business.name'),
            'og_description' => $seoDescription,
            'og_image' => asset('/assets/images/og-image.jpg'),
            'og_url' => route('about'),
            'twitter_card' => 'summary_large_image',
            'twitter_title' => __('messages.nav.about') . ' | ' . config('moly.business.name'),
            'twitter_description' => $seoDescription,
            'twitter_image' => asset('/assets/images/og-image.jpg'),
        ];

        return view('about', compact('seo'));
    }

    public function areas()
    {
        $areas = ServiceArea::active()->get();

        $seo = [
            'title' => __('messages.nav.areas') . ' | ' . config('moly.business.name'),
            'description' => config('moly.business.name') . ' service areas in Kuala Lumpur including KLCC, Bukit Bintang, Bukit Tunku, Chowkit, Medan Tuanku, Pudu, TRX, Brickfield, Bangsar, Damansara Heights, Petaling Jaya, Ampang, Kenny Hills, Melawati, Titiwangsa, Seputeh and more.',
            'robots' => 'index, follow',
            'canonical' => route('areas'),
            'og_type' => 'website',
            'og_title' => __('messages.nav.areas') . ' | ' . config('moly.business.name'),
            'og_description' => config('moly.business.name') . ' service areas across Kuala Lumpur and selected suburbs. View full coverage on our areas page.',
            'og_image' => asset('/assets/images/og-image.jpg'),
            'og_url' => route('areas'),
            'twitter_card' => 'summary_large_image',
            'twitter_title' => __('messages.nav.areas') . ' | ' . config('moly.business.name'),
            'twitter_description' => config('moly.business.name') . ' service areas in Kuala Lumpur and greater KL.',
            'twitter_image' => asset('/assets/images/og-image.jpg'),
        ];

        return view('areas', compact('areas', 'seo'));
    }

    public function faq()
    {
        $faqs = Faq::active()->get();

        $seo = [
            'title' => __('messages.nav.faq') . ' | ' . config('moly.business.name'),
            'description' => 'Frequently asked questions about ' . config('moly.business.name') . ' services, booking, areas and payment.',
            'robots' => 'index, follow',
            'canonical' => route('faq'),
            'og_type' => 'website',
            'og_title' => __('messages.nav.faq') . ' | ' . config('moly.business.name'),
            'og_description' => 'Frequently asked questions about ' . config('moly.business.name') . ' services, booking, areas and payment.',
            'og_image' => asset('/assets/images/og-image.jpg'),
            'og_url' => route('faq'),
            'twitter_card' => 'summary_large_image',
            'twitter_title' => __('messages.nav.faq') . ' | ' . config('moly.business.name'),
            'twitter_description' => 'Frequently asked questions about ' . config('moly.business.name') . ' services, booking, areas and payment.',
            'twitter_image' => asset('/assets/images/og-image.jpg'),
        ];

        return view('faq', compact('faqs', 'seo'));
    }

    public function contact()
    {
        $seo = [
            'title' => __('messages.nav.contact') . ' | ' . config('moly.business.name'),
            'description' => 'Contact ' . config('moly.business.name') . ' via WhatsApp or email for bookings and enquiries in Kuala Lumpur.',
            'robots' => 'index, follow',
            'canonical' => route('contact'),
            'og_type' => 'website',
            'og_title' => __('messages.nav.contact') . ' | ' . config('moly.business.name'),
            'og_description' => 'Contact ' . config('moly.business.name') . ' via WhatsApp or email for bookings and enquiries in Kuala Lumpur.',
            'og_image' => asset('/assets/images/og-image.jpg'),
            'og_url' => route('contact'),
            'twitter_card' => 'summary_large_image',
            'twitter_title' => __('messages.nav.contact') . ' | ' . config('moly.business.name'),
            'twitter_description' => 'Contact ' . config('moly.business.name') . ' via WhatsApp or email for bookings and enquiries in Kuala Lumpur.',
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

            return redirect()
                ->back()
                ->withCookie(cookie('locale', $locale, 60 * 24 * 365));
        }

        return redirect()->back();
    }

    public function privacy()
    {
        $seo = [
            'title' => 'Privacy Policy | ' . config('moly.business.name'),
            'description' => 'Privacy Policy for ' . config('moly.business.name') . '.',
            'robots' => 'noindex, follow',
            'canonical' => route('privacy'),
        ];
        return view('privacy', compact('seo'));
    }

    public function terms()
    {
        $seo = [
            'title' => 'Terms & Conditions | ' . config('moly.business.name'),
            'description' => 'Terms and Conditions for ' . config('moly.business.name') . '.',
            'robots' => 'noindex, follow',
            'canonical' => route('terms'),
        ];
        return view('terms', compact('seo'));
    }

    private function buildTreatments(Collection $baseServices): Collection
    {
        $order = __('messages.services.order');
        $descriptions = __('messages.services.descriptions');
        $placeholderUrl = versioned_asset('assets/images/service-placeholder.jpg');

        $result = collect();

        foreach ($order as $sortIndex => $treatmentName) {
            $matched = $baseServices->first(function ($svc) use ($treatmentName) {
                $dbName = mb_strtolower(trim((string)$svc->name));
                $target = mb_strtolower(trim((string)$treatmentName));

                if ($dbName === $target) return true;
                if ($target !== '' && str_contains($dbName, $target)) return true;

                if (str_contains($target, ' ')) {
                    $targetWords = preg_split('/\s+/', $target);
                    $allPresent = true;
                    foreach ($targetWords as $w) {
                        $w = trim((string)$w);
                        if ($w === '') continue;
                        if (!str_contains($dbName, mb_strtolower($w))) {
                            $allPresent = false;
                            break;
                        }
                    }
                    if ($allPresent) return true;
                }

                return false;
            });

            $obj = new stdClass();
            $obj->sort_order = $sortIndex + 1;
            $obj->is_active = true;
            $obj->name = $treatmentName;
            $slugRaw = preg_replace('/[^A-Za-z0-9]+/', '-', trim((string)$treatmentName));
            $obj->slug = strtolower(trim((string)$slugRaw, '-'));
            $obj->description = $descriptions[$treatmentName] ?? '';

            if ($matched) {
                $obj->id = $matched->id ?? null;
                $obj->image = $matched->image ?? '';
                $obj->prices = $matched->prices instanceof Collection
                    ? $matched->prices
                    : new Collection();
            } else {
                $obj->id = null;
                $obj->image = '';
                $obj->prices = new Collection();
            }

            if ($obj->prices instanceof Collection && $obj->prices->count() > 0) {
                $min = $obj->prices->min('price');
                $obj->lowest_price = is_numeric($min) ? (float)$min : 0.0;
            } else {
                $obj->lowest_price = 0.0;
            }

            $path = trim((string)($obj->image ?? ''));
            if ($path !== '' && (str_starts_with($path, 'http://') || str_starts_with($path, 'https://'))) {
                $obj->image_url = $path;
            } elseif ($path !== '') {
                $relative = ltrim($path, '/');
                $publicPath = public_path($relative);
                if (@is_file($publicPath) && @filesize($publicPath) >= 5000) {
                    $obj->image_url = versioned_asset($relative);
                } else {
                    $obj->image_url = $placeholderUrl;
                }
            } else {
                $obj->image_url = $placeholderUrl;
            }

            $result->push($obj);
        }

        return $result;
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
