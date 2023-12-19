<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Result;
use App\Models\User;
use App\Models\Vocabulary;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i < 20; $i++){
            Result::firstOrCreate(
                [
                    'category_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id','!=',0)->inRandomOrder()->first()->id,
                    'user_id' => User::select('id')->inRandomOrder()->first()->id,
                ],
                [
                    'type' => rand(1,7),
                    'correct' => rand(1,5),
                    'wrong' => rand(1,3),
                ]
            );
        }
    }
}
