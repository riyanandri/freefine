<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRecords = [
            [
                'id' => 1,
                'sektor_id' => 1,
                'nama_kategori' => 'LQ45',
                'deskripsi' => '',
                'status' => 1,
            ],
            [
                'id' => 2,
                'sektor_id' => 10,
                'nama_kategori' => 'IDX30',
                'deskripsi' => '',
                'status' => 1,
            ],
            [
                'id' => 3,
                'sektor_id' => 3,
                'nama_kategori' => 'IDX80',
                'deskripsi' => '',
                'status' => 1,
            ],
            [
                'id' => 4,
                'sektor_id' => 1,
                'nama_kategori' => 'KOMPAS100',
                'deskripsi' => '',
                'status' => 1,
            ],
        ];

        Category::insert($categoryRecords);
    }
}
