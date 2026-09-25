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
            ['name' => 'KL Sentral', 'sort_order' => 21],
            ['name' => 'Damansara Utama', 'sort_order' => 22],
            ['name' => 'Bukit Damansara', 'sort_order' => 23],
            ['name' => 'Taman Duta', 'sort_order' => 24],
            ['name' => 'Bukit Bandaraya', 'sort_order' => 25],
            ['name' => 'Bangsar South', 'sort_order' => 26],
            ['name' => 'Kampung Kerinchi', 'sort_order' => 27],
            ['name' => 'Pantai Hillpark', 'sort_order' => 28],
            ['name' => 'Seputeh', 'sort_order' => 29],
            ['name' => 'Taman U Thant', 'sort_order' => 30],
            ['name' => 'Titiwangsa', 'sort_order' => 31],
            ['name' => 'Ampang Hilir', 'sort_order' => 32],
            ['name' => 'Kampung Pandan', 'sort_order' => 33],
            ['name' => 'Desa Pandan', 'sort_order' => 34],
            ['name' => 'Segambut', 'sort_order' => 35],
            ['name' => 'Sentul', 'sort_order' => 36],
            ['name' => 'Melawati', 'sort_order' => 37],
        ];

        foreach ($areas as $area) {
            ServiceArea::firstOrCreate(['name' => $area['name']], $area);
        }
    }
}
