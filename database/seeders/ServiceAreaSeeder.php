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
            ['name' => 'TRX (Tun Razak Exchange)', 'sort_order' => 7],
            ['name' => 'KL Sentral', 'sort_order' => 8],
            ['name' => 'Brickfield', 'sort_order' => 9],
            ['name' => 'Titiwangsa', 'sort_order' => 10],
            ['name' => 'Seputeh', 'sort_order' => 11],
            ['name' => 'Bangsar', 'sort_order' => 12],
            ['name' => 'Bukit Damansara', 'sort_order' => 13],
            ['name' => 'Damansara Heights', 'sort_order' => 14],
            ['name' => 'Mont Kiara', 'sort_order' => 15],
            ['name' => 'Sri Hartamas', 'sort_order' => 16],
            ['name' => 'Kenny Hills', 'sort_order' => 17],
            ['name' => 'Ampang', 'sort_order' => 18],
            ['name' => 'Damansara', 'sort_order' => 19],
            ['name' => 'Petaling Jaya', 'sort_order' => 20],
            ['name' => 'Melawati', 'sort_order' => 21],
            ['name' => 'Setapak', 'sort_order' => 22],
            ['name' => 'Cheras', 'sort_order' => 23],
        ];

        foreach ($areas as $area) {
            ServiceArea::create($area);
        }
    }
}
