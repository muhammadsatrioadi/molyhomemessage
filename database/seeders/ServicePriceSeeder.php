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
            'relaxing-massage' => [
                ['duration' => 60, 'price' => 130],
                ['duration' => 90, 'price' => 180],
                ['duration' => 120, 'price' => 220],
            ],
            'standard-massage' => [
                ['duration' => 60, 'price' => 140],
                ['duration' => 90, 'price' => 200],
                ['duration' => 120, 'price' => 240],
            ],
            'deep-tissue' => [
                ['duration' => 60, 'price' => 160],
                ['duration' => 90, 'price' => 230],
                ['duration' => 120, 'price' => 280],
            ],
            'thai-massage' => [
                ['duration' => 60, 'price' => 200],
                ['duration' => 90, 'price' => 260],
                ['duration' => 120, 'price' => 310],
            ],
            // Add-on: harga tetap, tanpa durasi (duration = 0).
            'cupping' => [
                ['duration' => 0, 'price' => 85],
            ],
            'body-scrub' => [
                ['duration' => 0, 'price' => 70],
            ],
            'hot-stone' => [
                ['duration' => 0, 'price' => 100],
            ],
        ];

        foreach ($prices as $slug => $priceList) {
            $service = Service::where('slug', $slug)->first();
            if (!$service) {
                continue;
            }

            // Idempotent: bersihkan harga lama layanan ini lalu tulis ulang harga terbaru.
            ServicePrice::where('service_id', $service->id)->delete();

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
