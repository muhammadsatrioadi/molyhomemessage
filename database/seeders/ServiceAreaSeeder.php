<?php

namespace Database\Seeders;

use App\Models\ServiceArea;
use Illuminate\Database\Seeder;

class ServiceAreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            ['name' => 'KLCC', 'sort_order' => 1],
            ['name' => 'Bukit Bintang', 'sort_order' => 2],
            ['name' => 'Bukit Tunku', 'sort_order' => 3],
            ['name' => 'Chowkit', 'sort_order' => 4],
            ['name' => 'Medan Tuanku', 'sort_order' => 5],
            ['name' => 'Pudu', 'sort_order' => 6],
            ['name' => 'KL Sentral', 'sort_order' => 7],
            ['name' => 'Bangsar', 'sort_order' => 8],
            ['name' => 'Mont Kiara', 'sort_order' => 9],
            ['name' => 'Sri Hartamas', 'sort_order' => 10],
            ['name' => 'Ampang', 'sort_order' => 11],
            ['name' => 'Damansara', 'sort_order' => 12],
            ['name' => 'Setapak', 'sort_order' => 13],
            ['name' => 'Cheras', 'sort_order' => 14],
        ];

        foreach ($areas as $area) {
            ServiceArea::create($area);
        }
    }
}
