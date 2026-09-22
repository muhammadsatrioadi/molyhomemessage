<?php

namespace Database\Seeders;

use App\Models\ServiceArea;
use Illuminate\Database\Seeder;

class ServiceAreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            ['name' => 'Kuala Lumpur', 'sort_order' => 1],
            ['name' => 'Kuala Lumpur City Centre', 'sort_order' => 2],
            ['name' => 'Bukit Bintang', 'sort_order' => 3],
            ['name' => 'Chow Kit', 'sort_order' => 4],
            ['name' => 'Bukit Ceylon', 'sort_order' => 5],
            ['name' => 'Bukit Tunku', 'sort_order' => 6],
            ['name' => 'Brickfields', 'sort_order' => 7],
            ['name' => 'Bangsar', 'sort_order' => 8],
            ['name' => 'Ampang', 'sort_order' => 9],
            ['name' => 'Cheras', 'sort_order' => 10],
            ['name' => 'Sungai Besi', 'sort_order' => 11],
            ['name' => 'Kuchai Lama', 'sort_order' => 12],
            ['name' => 'Mont Kiara', 'sort_order' => 13],
            ['name' => 'Sri Hartamas', 'sort_order' => 14],
            ['name' => 'Bukit Jalil', 'sort_order' => 15],
            ['name' => 'Petaling Jaya', 'sort_order' => 16],
            ['name' => 'Bandar Utama', 'sort_order' => 17],
            ['name' => 'Damansara Perdana', 'sort_order' => 18],
            ['name' => 'Kota Damansara', 'sort_order' => 19],
            ['name' => 'Bandar Sunway', 'sort_order' => 20],
        ];

        foreach ($areas as $area) {
            ServiceArea::create($area);
        }
    }
}
