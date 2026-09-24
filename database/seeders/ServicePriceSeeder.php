<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServicePrice;
use Illuminate\Database\Seeder;

class ServicePriceSeeder extends Seeder
{
    public function run(): void
    {
        $prices = [
            'full-body-back-massage' => [
                ['duration' => 60, 'price' => 130],
                ['duration' => 90, 'price' => 190],
                ['duration' => 120, 'price' => 230],
            ],
            'head-neck-massage' => [
                ['duration' => 30, 'price' => 80],
                ['duration' => 60, 'price' => 130],
                ['duration' => 90, 'price' => 180],
            ],
            'traditional-massage' => [
                ['duration' => 60, 'price' => 150],
                ['duration' => 90, 'price' => 220],
                ['duration' => 120, 'price' => 270],
            ],
            'aromatherapy-massage' => [
                ['duration' => 60, 'price' => 160],
                ['duration' => 90, 'price' => 230],
                ['duration' => 120, 'price' => 280],
            ],
            'balinese-massage' => [
                ['duration' => 60, 'price' => 140],
                ['duration' => 90, 'price' => 200],
                ['duration' => 120, 'price' => 240],
            ],
            'swedish-massage' => [
                ['duration' => 60, 'price' => 140],
                ['duration' => 90, 'price' => 200],
                ['duration' => 120, 'price' => 240],
            ],
            'deep-tissue-massage' => [
                ['duration' => 60, 'price' => 180],
                ['duration' => 90, 'price' => 250],
                ['duration' => 120, 'price' => 300],
            ],
            'deep-tissue' => [
                ['duration' => 60, 'price' => 180],
                ['duration' => 90, 'price' => 250],
                ['duration' => 120, 'price' => 300],
            ],
            'hot-stone' => [
                ['duration' => 120, 'price' => 400],
            ],
            'hot-herbal' => [
                ['duration' => 120, 'price' => 380],
            ],
            'postnatal-massage' => [
                ['duration' => 60, 'price' => 150],
                ['duration' => 90, 'price' => 220],
                ['duration' => 120, 'price' => 270],
            ],
            'prenatal-massage' => [
                ['duration' => 60, 'price' => 140],
                ['duration' => 90, 'price' => 200],
                ['duration' => 120, 'price' => 240],
            ],
            'foot-massage' => [
                ['duration' => 60, 'price' => 140],
                ['duration' => 90, 'price' => 200],
                ['duration' => 120, 'price' => 240],
            ],
            'lomi-lomi-massage' => [
                ['duration' => 120, 'price' => 350],
            ],
            'thai-massage' => [
                ['duration' => 60, 'price' => 200],
                ['duration' => 90, 'price' => 270],
                ['duration' => 120, 'price' => 350],
            ],
            'foot-massage-standard' => [
                ['duration' => 60, 'price' => 140],
                ['duration' => 90, 'price' => 200],
                ['duration' => 120, 'price' => 240],
            ],
            'foot-massage-deep-pressure' => [
                ['duration' => 60, 'price' => 170],
                ['duration' => 90, 'price' => 240],
                ['duration' => 120, 'price' => 290],
            ],
            'couples-shared-session' => [
                ['duration' => 60, 'price' => 260],
                ['duration' => 90, 'price' => 380],
                ['duration' => 120, 'price' => 470],
            ],
            'body-scrub' => [
                ['duration' => 30, 'price' => 70],
            ],
        ];

        foreach ($prices as $slug => $priceList) {
            $service = Service::where('slug', $slug)->first();
            if ($service) {
                foreach ($priceList as $p) {
                    ServicePrice::create([
                        'service_id' => $service->id,
                        'duration' => $p['duration'],
                        'price' => $p['price'],
                    ]);
                }
            }
        }
    }
}
