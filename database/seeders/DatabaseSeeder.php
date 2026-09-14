<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ServiceSeeder::class,
            ServicePriceSeeder::class,
            ServiceAreaSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
