<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            [
                'id' => 1,
                'nama' => 'Ardhin Primadewi',
                'tipe' => 'superadmin',
                'investor_id' => 0,
                'no_telp' => '087236725233',
                'email' => 'ardhin@admin.com',
                'password' => Hash::make('ardhin123'),
                'photo' => '',
                'status' => 1,
            ],
            [
                'id' => 2,
                'nama' => 'Muhammad Riyan',
                'tipe' => 'investor',
                'investor_id' => 1,
                'no_telp' => '085328179759',
                'email' => 'hiddenfoxe01@gmail.com',
                'password' => Hash::make('riyan123'),
                'photo' => '',
                'status' => 1,
            ],
        ];

        Admin::insert($adminRecords);
    }
}
