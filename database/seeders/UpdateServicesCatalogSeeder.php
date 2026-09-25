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
                'name' => 'Deep Tissue',
                'slug' => 'deep-tissue',
                'description' => 'A therapeutic massage using deeper, focused pressure to target areas of persistent muscle tension and knots. Helps relieve stiffness, improve mobility, and support recovery from postural strain or heavy daily activity.',
                'image' => '/assets/images/service-deep-tissue.jpg',
                'sort_order' => 1,
            ],
            [
                'name' => 'Balinese Massage',
                'slug' => 'balinese-massage',
                'description' => 'A traditional Balinese-style treatment combining firm pressure, gentle stretching, and aromatherapy oil techniques. Designed to improve circulation, release tension, and leave the body feeling relaxed and revitalised.',
                'image' => '/assets/images/service-balinese.jpg',
                'sort_order' => 2,
            ],
            [
                'name' => 'Foot Massage',
                'slug' => 'foot-massage',
                'description' => 'A focused treatment on the feet and soles using reflexology-inspired pressure points and massage strokes. Helps relieve tired, aching feet, promotes overall relaxation, and provides a soothing wellness session.',
                'image' => '/assets/images/service-foot-standard.jpg',
                'sort_order' => 3,
            ],
            [
                'name' => 'Hot Stone',
                'slug' => 'hot-stone',
                'description' => 'A warming relaxation treatment using smooth, heated basalt stones placed along key muscle areas and used during massage strokes. The gentle heat helps loosen tight muscles, ease stress, and create a deeply calming experience.',
                'image' => '/assets/images/hot-stone-massage.jpg',
                'sort_order' => 4,
            ],
            [
                'name' => 'Postnatal Massage',
                'slug' => 'postnatal-massage',
                'description' => 'A gentle, nurturing massage designed for mothers after childbirth. Delivered with care and comfortable positioning to help relieve post-birth muscle tension, improve circulation, and support general wellbeing. Always consult your healthcare provider before your first postnatal session.',
                'image' => '/assets/images/service-Postnatal Massage.jpg',
                'sort_order' => 5,
            ],
            [
                'name' => 'Prenatal Massage',
                'slug' => 'prenatal-massage',
                'description' => 'A soft, safe massage for expecting mothers using supportive side-lying positioning and light to moderate pressure. Helps relieve common pregnancy discomfort such as lower back tension while supporting calm and rest. Subject to your doctor or midwife approval.',
                'image' => '/assets/images/Prenatal Massage.jpg',
                'sort_order' => 6,
            ],
            [
                'name' => 'Body Scrub',
                'slug' => 'body-scrub',
                'description' => 'A full-body wellness treatment combining gentle exfoliation with light massage strokes. Helps remove dull surface skin, leaving skin feeling smooth, refreshed, and lightly moisturised for an overall rejuvenated feel.',
                'image' => '/assets/images/service-body-scrub.jpg',
                'sort_order' => 7,
            ],
            [
                'name' => 'Lomi-Lomi Massage',
                'slug' => 'lomi-lomi-massage',
                'description' => 'A Hawaiian-inspired relaxation treatment characterised by long, flowing, rhythmic strokes across the body. Designed to encourage deep relaxation, release stress, and create a nurturing, uninterrupted wellness experience.',
                'image' => '/assets/images/lomi-lomi-massage.jpg',
                'sort_order' => 8,
            ],
            [
                'name' => 'Thai Massage',
                'slug' => 'thai-massage',
                'description' => 'A traditional Thai-inspired treatment using acupressure, assisted movement, and gentle stretching on a comfortable mat. Promotes flexibility, energy flow, and a balanced sense of relaxation while leaving you feeling refreshed and mobile.',
                'image' => '/assets/images/service-thai.jpg',
                'sort_order' => 9,
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

        Service::whereIn('name', ['Home Herbal Massage', 'Boreh Herbal Massage'])
            ->update(['is_active' => false]);
    }
}
