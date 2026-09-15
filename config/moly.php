<?php

return [
    'brand' => [
        'primary' => 'MOLLY',
        'secondary' => 'KL HOME MASSAGE',
    ],

    'business' => [
        'name' => env('APP_NAME', 'MOLLY KL HOME MASSAGE'),
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
        'description' => 'Professional home and hotel massage service in Kuala Lumpur. Book your massage directly via WhatsApp.',
        'keywords' => 'home massage, hotel massage, outcall massage, kuala lumpur massage, balinese massage, deep tissue, thai massage, foot massage',
    ],

    'seo' => [
        'default_title' => 'MOLLY KL HOME MASSAGE | Home & Hotel Massage Kuala Lumpur',
        'default_description' => 'Professional home and hotel massage service in Kuala Lumpur. Book your massage directly via WhatsApp.',
        'robots' => 'index, follow',
        'og_type' => 'website',
        'og_image' => '/assets/images/og-image.jpg',
        'twitter_card' => 'summary_large_image',
    ],
];
