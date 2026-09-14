<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah L.',
                'content' => 'The Balinese massage was absolutely wonderful. The therapist arrived on time at my hotel room and the entire experience was incredibly relaxing. Will definitely book again on my next visit to KL.',
                'rating' => 5,
                'sort_order' => 1,
            ],
            [
                'name' => 'Michael T.',
                'content' => 'Great deep tissue massage that really helped with my shoulder tension. Booking was seamless via WhatsApp and the therapist was very professional. Highly recommend for anyone staying in KLCC area.',
                'rating' => 5,
                'sort_order' => 2,
            ],
            [
                'name' => 'Priya K.',
                'content' => 'Loved the convenience of having a massage at my apartment. The foot massage deep pressure was exactly what I needed after a long week. Professional and hygienic service throughout.',
                'rating' => 5,
                'sort_order' => 3,
            ],
            [
                'name' => 'James W.',
                'content' => 'The Thai massage was excellent. The stretch techniques really helped with my flexibility. Communication was clear and the pricing is transparent. Great service in Bukit Bintang.',
                'rating' => 5,
                'sort_order' => 4,
            ],
            [
                'name' => 'Nur H.',
                'content' => 'I have tried a few home massage services in KL and MOLY stands out for their punctuality and consistent quality. The body scrub followed by Balinese massage is my favourite combination.',
                'rating' => 5,
                'sort_order' => 5,
            ],
            [
                'name' => 'David R.',
                'content' => 'From booking to completion, everything was smooth. The therapist was courteous, the massage was effective, and the convenience factor cannot be overstated. Will use their services again.',
                'rating' => 5,
                'sort_order' => 6,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }
    }
}
