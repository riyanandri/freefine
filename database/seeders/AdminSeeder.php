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
            'id' => 1,
            'nama' => 'Super Admin',
            'tipe' => 'superadmin',
            'investor_id' => 0,
            'no_telp' => '087236725233',
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('123'),
            'photo' => '',
            'status' => 1,
        ];

        Admin::insert($adminRecords);
    }
}
