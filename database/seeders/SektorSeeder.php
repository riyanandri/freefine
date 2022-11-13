<?php

namespace Database\Seeders;

use App\Models\Sektor;
use Illuminate\Database\Seeder;

class SektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sektorRecords = [
            [
                'id' => 1,
                'nama' => 'Barang Baku',
                'status' => 1,
            ],
            [
                'id' => 2,
                'nama' => 'Non-Primer',
                'status' => 1,
            ],
            [
                'id' => 3,
                'nama' => 'Primer',
                'status' => 1,
            ],
            [
                'id' => 4,
                'nama' => 'Energi',
                'status' => 1,
            ],
            [
                'id' => 5,
                'nama' => 'Keuangan',
                'status' => 1,
            ],
            [
                'id' => 6,
                'nama' => 'Kesehatan',
                'status' => 1,
            ],
            [
                'id' => 7,
                'nama' => 'Perindustrian',
                'status' => 1,
            ],
            [
                'id' => 8,
                'nama' => 'Infrastruktur',
                'status' => 1,
            ],
            [
                'id' => 9,
                'nama' => 'Properti',
                'status' => 1,
            ],
            [
                'id' => 10,
                'nama' => 'Teknologi',
                'status' => 1,
            ],
            [
                'id' => 11,
                'nama' => 'Transportasi',
                'status' => 1,
            ],
        ];

        Sektor::insert($sektorRecords);
    }
}
