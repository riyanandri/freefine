<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(InvestorSeeder::class);
        $this->call(SektorSeeder::class);
        $this->call(CategorySeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
