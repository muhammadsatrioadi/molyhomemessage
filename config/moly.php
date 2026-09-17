<?php

return [
    'brand' => [
        'primary' => 'MOLLY',
        'secondary' => 'KL OUTCALL MASSAGE',
    ],

    'business' => [
        'name' => env('APP_NAME', 'MOLLY KL OUTCALL MASSAGE'),
        'tagline' => 'Premium Massage, Wherever You Are',
        'location' => 'Kuala Lumpur, Malaysia',
        'whatsapp' => env('MOLY_WHATSAPP'),
        'email' => env('MOLY_EMAIL'),
    ],

    'currency' => 'RM',

    'hours' => [
        'monday' => '10:00 - 23:00',
        'tuesday' => '10:00 - 23:00',
        'wednesday' => '10:00 - 23:00',
        'thursday' => '10:00 - 23:00',
        'friday' => '10:00 - 23:00',
        'saturday' => '10:00 - 23:00',
        'sunday' => '10:00 - 23:00',
    ],

    'social' => [
        'facebook' => env('MOLY_FACEBOOK', ''),
        'instagram' => env('MOLY_INSTAGRAM', ''),
        'tiktok' => env('MOLY_TIKTOK', ''),
    ],

    'site' => [
        'description' => 'Professional outcall massage service across Kuala Lumpur. Therapist travels to your hotel, residence, apartment or preferred location. Book directly via WhatsApp.',
        'keywords' => 'outcall massage, kuala lumpur outcall massage, hotel massage, balinese massage, deep tissue, thai massage, foot massage, hot stone, prenatal massage, postnatal massage, body scrub, lomi lomi',
    ],

    'seo' => [
        'default_title' => 'MOLLY KL OUTCALL MASSAGE | Outcall Massage Kuala Lumpur',
        'default_description' => 'Professional outcall massage service across Kuala Lumpur. Therapist travels to your hotel, residence, apartment or preferred location. Book directly via WhatsApp.',
        'robots' => 'index, follow',
        'og_type' => 'website',
        'og_image' => '/assets/images/og-image.jpg',
        'twitter_card' => 'summary_large_image',
    ],
];
