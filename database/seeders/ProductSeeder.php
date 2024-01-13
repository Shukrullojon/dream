<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i ++){
            $product = Product::create([
                'category_id' => Category::select('id')->inRandomOrder()->first()->id,
                'name' => "Cap",
                'coins' => rand(1000, 10000),
                'status' => 1,
            ]);
            Media::create([
                'model' => Product::class,
                'model_id' => $product->id,
                'data' => 'image.jpeg',
                'type' => 1,
                'status' => 1,
            ]);
            Media::create([
                'model' => Product::class,
                'model_id' => $product->id,
                'data' => 'image.jpeg',
                'type' => 1,
                'status' => 1,
            ]);
        }
    }
}
