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
            'balinese-massage' => [
                ['duration' => 60, 'price' => 140],
                ['duration' => 90, 'price' => 200],
                ['duration' => 120, 'price' => 240],
            ],
            'deep-tissue-massage' => [
                ['duration' => 60, 'price' => 180],
                ['duration' => 90, 'price' => 250],
                ['duration' => 120, 'price' => 300],
            ],
            'thai-massage' => [
                ['duration' => 60, 'price' => 240],
                ['duration' => 90, 'price' => 310],
                ['duration' => 120, 'price' => 370],
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
