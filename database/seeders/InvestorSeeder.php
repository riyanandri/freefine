<?php

namespace Database\Seeders;

use App\Models\Investor;
use Illuminate\Database\Seeder;

class InvestorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $investorRecords = [
            [
                'id' => 1,
                'nama' => 'Muhammad Riyan',
                'no_telp' => '085328179759',
                'email' => 'hiddenfoxe01@gmail.com',
                'password' => bcrypt('riyan123'),
                'alamat' => 'Ngadirojo RT 04 RW 06, Secang, Magelang',
                'kota' => 'Kab. Magelang',
                'kecamatan' => 'Secang',
                'provinsi' => 'Jawa Tengah',
                'kode_pos' => '56195',
                'photo' => '',
                'status' => 0,
            ],
            [
                'id' => 2,
                'nama' => 'Catur Rahmawati',
                'no_telp' => '0852747626431',
                'email' => 'caturrhm@gmail.com',
                'password' => bcrypt('catur123'),
                'alamat' => 'Karang gading RT 01 RW 03, Magelang Selatan, Magelang',
                'kota' => 'Magelang',
                'kecamatan' => 'Magelang Selatan',
                'provinsi' => 'Jawa Tengah',
                'kode_pos' => '57392',
                'photo' => '',
                'status' => 0,
            ],
        ];
        Investor::insert($investorRecords);
    }
}
