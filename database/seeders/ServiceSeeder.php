<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Balinese Massage',
                'slug' => 'balinese-massage',
                'description' => 'A traditional Indonesian massage combining gentle stretches, acupressure, and aromatherapy oil techniques. Experience deep relaxation as skilled hands work to release muscle tension, improve circulation, and promote overall wellbeing through flowing, rhythmic movements.',
                'image' => '/assets/images/service-balinese.jpg',
                'sort_order' => 1,
            ],
            [
                'name' => 'Deep Tissue Massage',
                'slug' => 'deep-tissue-massage',
                'description' => 'Targeting the deeper layers of muscle and connective tissue, this therapeutic massage uses slow, firm pressure to release chronic tension, knots, and muscle adhesions. Ideal for individuals with persistent muscle tightness, sports injuries, or postural issues.',
                'image' => '/assets/images/service-deep-tissue.jpg',
                'sort_order' => 2,
            ],
            [
                'name' => 'Thai Massage',
                'slug' => 'thai-massage',
                'description' => 'An ancient healing art from Thailand combining acupressure, Indian Ayurvedic principles, and assisted yoga stretches. Performed on a mat with comfortable clothing, this energising massage uses passive stretching and gentle pressure along energy lines to restore balance and flexibility.',
                'image' => '/assets/images/service-thai.jpg',
                'sort_order' => 3,
            ],
            [
                'name' => 'Foot Massage Standard',
                'slug' => 'foot-massage-standard',
                'description' => 'A relaxing foot massage based on reflexology principles, applying gentle to moderate pressure to specific reflex points on the feet. This treatment helps relieve tired, aching feet, reduce stress, and promote relaxation throughout the entire body.',
                'image' => '/assets/images/service-foot-standard.jpg',
                'sort_order' => 4,
            ],
            [
                'name' => 'Foot Massage Deep Pressure',
                'slug' => 'foot-massage-deep-pressure',
                'description' => 'An intensive foot reflexology session applying firm pressure to stimulate reflex zones and energy channels. Recommended for those with chronic foot tension, plantar issues, or those who prefer a deeper, more invigorating foot treatment experience.',
                'image' => '/assets/images/service-foot-deep.jpg',
                'sort_order' => 5,
            ],
            [
                'name' => 'Body Scrub',
                'slug' => 'body-scrub',
                'description' => 'A gentle yet effective full-body exfoliation treatment using natural ingredients to remove dead skin cells, leaving the skin smooth, refreshed, and rejuvenated. Perfect as a standalone treatment or to complement your massage experience.',
                'image' => '/assets/images/service-body-scrub.jpg',
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
