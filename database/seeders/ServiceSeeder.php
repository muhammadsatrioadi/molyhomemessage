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
                'name' => 'Full Body Back Massage',
                'slug' => 'full-body-back-massage',
                'description' => 'A deeply therapeutic session focusing on the back, shoulders and upper body. Using long flowing strokes combined with firm pressure to release tension, reduce stiffness and improve posture. Perfect for those with desk-related soreness, back discomfort or simply needing a thorough relaxation session.',
                'image' => '/assets/images/service-full-body-back.jpg',
                'sort_order' => 1,
            ],
            [
                'name' => 'Head & Neck Massage',
                'slug' => 'head-neck-massage',
                'description' => 'A targeted, soothing massage focusing on scalp, neck, shoulders and upper back areas that commonly hold stress. Using acupressure points and rhythmic kneading to relieve tension headaches, stiff neck and mental fatigue — leaving you calm, refreshed and renewed.',
                'image' => '/assets/images/service-head-neck.jpg',
                'sort_order' => 2,
            ],
            [
                'name' => 'Traditional Massage',
                'slug' => 'traditional-massage',
                'description' => 'A classic holistic massage inspired by timeless techniques passed down through generations. Blends firm kneading, gentle stretching and acupressure along the entire body to balance energy flow, release deep-seated muscle knots and restore overall sense of wellbeing through time-honoured practices.',
                'image' => '/assets/images/service-traditional.jpg',
                'sort_order' => 3,
            ],
            [
                'name' => 'Aromatherapy Massage',
                'slug' => 'aromatherapy-massage',
                'description' => 'An indulgent, calming massage using warm essential oils chosen to uplift the senses and melt away stress. Long flowing effleurage strokes combined with lavender, eucalyptus or citrus-infused oils to soothe the nervous system, reduce anxiety and leave skin feeling nourished.',
                'image' => '/assets/images/service-aromatherapy.jpg',
                'sort_order' => 4,
            ],
            [
                'name' => 'Balinese Massage',
                'slug' => 'balinese-massage',
                'description' => 'A traditional Indonesian massage combining gentle stretches, acupressure, and aromatherapy oil techniques. Experience deep relaxation as skilled hands work to release muscle tension, improve circulation, and promote overall wellbeing through flowing, rhythmic movements.',
                'image' => '/assets/images/service-balinese.jpg',
                'sort_order' => 5,
            ],
            [
                'name' => 'Swedish Massage',
                'slug' => 'swedish-massage',
                'description' => 'The classic Western massage using five foundational strokes — effleurage, petrissage, tapotement, friction and vibration. Gentle to moderate pressure relaxes muscles, boosts circulation, reduces stress hormones and creates a state of full-body relaxation.',
                'image' => '/assets/images/service-swedish.jpg',
                'sort_order' => 6,
            ],
            [
                'name' => 'Deep Tissue Massage',
                'slug' => 'deep-tissue-massage',
                'description' => 'Targeting the deeper layers of muscle and connective tissue, this therapeutic massage uses slow, firm pressure to release chronic tension, knots, and muscle adhesions. Ideal for individuals with persistent muscle tightness, sports injuries, or postural issues.',
                'image' => '/assets/images/service-deep-tissue.jpg',
                'sort_order' => 7,
            ],
            [
                'name' => 'Thai Massage',
                'slug' => 'thai-massage',
                'description' => 'An ancient healing art from Thailand combining acupressure, Indian Ayurvedic principles, and assisted yoga stretches. Performed on a mat with comfortable clothing, this energising massage uses passive stretching and gentle pressure along energy lines to restore balance and flexibility.',
                'image' => '/assets/images/service-thai.jpg',
                'sort_order' => 8,
            ],
            [
                'name' => 'Foot Massage Standard',
                'slug' => 'foot-massage-standard',
                'description' => 'A relaxing foot massage based on reflexology principles, applying gentle to moderate pressure to specific reflex points on the feet. This treatment helps relieve tired, aching feet, reduce stress, and promote relaxation throughout the entire body.',
                'image' => '/assets/images/service-foot-standard.jpg',
                'sort_order' => 9,
            ],
            [
                'name' => 'Foot Massage Deep Pressure',
                'slug' => 'foot-massage-deep-pressure',
                'description' => 'An intensive foot reflexology session applying firm pressure to stimulate reflex zones and energy channels. Recommended for those with chronic foot tension, plantar issues, or those who prefer a deeper, more invigorating foot treatment experience.',
                'image' => '/assets/images/service-foot-deep.jpg',
                'sort_order' => 10,
            ],
            [
                'name' => 'Couples / Shared Session',
                'slug' => 'couples-shared-session',
                'description' => 'A premium, side-by-side massage experience for couples, friends or family members wanting to share a moment of relaxation together. Two therapists work in the same session, each delivering your chosen massage style in a professional, serene environment at your home or hotel room.',
                'image' => '/assets/images/service-couples.jpg',
                'sort_order' => 11,
            ],
            [
                'name' => 'Body Scrub',
                'slug' => 'body-scrub',
                'description' => 'A gentle yet effective full-body exfoliation treatment using natural ingredients to remove dead skin cells, leaving the skin smooth, refreshed, and rejuvenated. Perfect as a standalone treatment or to complement your massage experience.',
                'image' => '/assets/images/service-body-scrub.jpg',
                'sort_order' => 12,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
