<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class UpdateServicesCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $catalog = [
            [
                'name' => 'Relaxing Massage',
                'slug' => 'relaxing-massage',
                'description' => 'A gentle, soothing full-body massage using light to medium pressure and long, flowing strokes. Designed to calm the mind, ease everyday tension, and leave the body feeling deeply relaxed and refreshed.',
                'image' => '/assets/images/service-lomi.jpg',
                'sort_order' => 1,
            ],
            [
                'name' => 'Standard Massage',
                'slug' => 'standard-massage',
                'description' => 'A balanced full-body massage using moderate pressure and classic massage strokes. Helps relieve general muscle tension, improve circulation, and restore a comfortable sense of wellbeing.',
                'image' => '/assets/images/service-swedish.jpg',
                'sort_order' => 2,
            ],
            [
                'name' => 'Deep Tissue',
                'slug' => 'deep-tissue',
                'description' => 'A therapeutic massage using deeper, focused pressure to target areas of persistent muscle tension and knots. Helps relieve stiffness, improve mobility, and support recovery from postural strain or heavy daily activity.',
                'image' => '/assets/images/service-deep-tissue.jpg',
                'sort_order' => 3,
            ],
            [
                'name' => 'Thai Massage',
                'slug' => 'thai-massage',
                'description' => 'A traditional Thai-inspired treatment using acupressure, assisted movement, and gentle stretching on a comfortable mat. Promotes flexibility, energy flow, and a balanced sense of relaxation while leaving you feeling refreshed and mobile.',
                'image' => '/assets/images/service-thai.jpg',
                'sort_order' => 4,
            ],
            [
                'name' => 'Cupping',
                'slug' => 'cupping',
                'description' => 'A traditional therapy using suction cups placed on the skin to help release muscle tension, improve blood flow, and ease tightness in targeted areas. Offered as an add-on to complement your massage session.',
                'image' => '/assets/images/service-aromatherapy.jpg',
                'sort_order' => 5,
            ],
            [
                'name' => 'Body Scrub',
                'slug' => 'body-scrub',
                'description' => 'A full-body wellness add-on combining gentle exfoliation with light massage strokes. Helps remove dull surface skin, leaving skin feeling smooth, refreshed, and lightly moisturised for an overall rejuvenated feel.',
                'image' => '/assets/images/service-body-scrub.jpg',
                'sort_order' => 6,
            ],
            [
                'name' => 'Hot Stone',
                'slug' => 'hot-stone',
                'description' => 'A warming add-on using smooth, heated basalt stones placed along key muscle areas and used during massage strokes. The gentle heat helps loosen tight muscles, ease stress, and create a deeply calming experience.',
                'image' => '/assets/images/hot-stone-massage.jpg',
                'sort_order' => 7,
            ],
        ];

        foreach ($catalog as $idx => $data) {
            $service = Service::firstOrCreate(
                ['slug' => $data['slug']],
                [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'image' => $data['image'],
                    'sort_order' => $data['sort_order'],
                    'is_active' => true,
                ]
            );

            $service->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'image' => $data['image'],
                'sort_order' => $data['sort_order'],
                'is_active' => true,
            ]);
        }

        // Sembunyikan (nonaktifkan) semua layanan lama yang tidak termasuk dalam menu terbaru.
        // Tidak dihapus dari database, hanya di-set is_active = false.
        Service::whereNotIn('slug', array_column($catalog, 'slug'))
            ->update(['is_active' => false]);
    }
}
