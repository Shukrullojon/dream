<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Vocabulary;
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
        $data = [
            [
                'model' => Vocabulary::class,
                'parent_id' => 0,
                'name' => 'People',
                'image' => '',
                'status' => 1,
            ],
            [
                'model' => Vocabulary::class,
                'parent_id' => 0,
                'name' => 'Describing People',
                'image' => '',
                'status' => 1,
            ],
            [
                'model' => Vocabulary::class,
                'parent_id' => 0,
                'name' => 'Fashion',
                'image' => '',
                'status' => 1,
            ],
            [
                'model' => Vocabulary::class,
                'parent_id' => 0,
                'name' => 'Body',
                'image' => '',
                'status' => 1,
            ],
            [
                'model' => Vocabulary::class,
                'parent_id' => 0,
                'name' => 'Health',
                'image' => '',
                'status' => 1,
            ],
        ];
        foreach ($data as $d){
            Category::create($d);
        }

        $subData = [
            [
                'model' => Vocabulary::class,
                'parent_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id',0)->inRandomOrder()->first()->id,
                'name' => 'Family',
                'image' => '',
                'status' => 1,
            ],
            [
                'model' => Vocabulary::class,
                'parent_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id',0)->inRandomOrder()->first()->id,
                'name' => 'Love & Friendship',
                'image' => '',
                'status' => 1,
            ],
            [
                'model' => Vocabulary::class,
                'parent_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id',0)->inRandomOrder()->first()->id,
                'name' => 'Identity',
                'image' => '',
                'status' => 1,
            ],
            [
                'model' => Vocabulary::class,
                'parent_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id',0)->inRandomOrder()->first()->id,
                'name' => 'Age & Life Events',
                'image' => '',
                'status' => 1,
            ],
            [
                'model' => Vocabulary::class,
                'parent_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id',0)->inRandomOrder()->first()->id,
                'name' => 'Characteristics 1',
                'image' => '',
                'status' => 1,
            ],
            [
                'model' => Vocabulary::class,
                'parent_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id',0)->inRandomOrder()->first()->id,
                'name' => 'Characteristics 2',
                'image' => '',
                'status' => 1,
            ],
            [
                'model' => Vocabulary::class,
                'parent_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id',0)->inRandomOrder()->first()->id,
                'name' => 'Physical Characteristics',
                'image' => '',
                'status' => 1,
            ],
            [
                'model' => Vocabulary::class,
                'parent_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id',0)->inRandomOrder()->first()->id,
                'name' => 'Physical States',
                'image' => '',
                'status' => 1,
            ],
            [
                'model' => Vocabulary::class,
                'parent_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id',0)->inRandomOrder()->first()->id,
                'name' => 'Emotional States',
                'image' => '',
                'status' => 1,
            ],
            [
                'model' => Vocabulary::class,
                'parent_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id',0)->inRandomOrder()->first()->id,
                'name' => 'Feelings',
                'image' => '',
                'status' => 1,
            ],
        ];

        foreach ($subData as $sub){
            Category::create($sub);
        }
    }
}
