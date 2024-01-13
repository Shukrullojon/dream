<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Global',
                'status' => 1
            ],
            [
                'name' => 'Books',
                'status' => 1
            ],
            [
                'name' => 'Apple products',
                'status' => 1
            ],
        ];
        foreach ($data as $d){
            Category::create($d);
        }
    }
}
