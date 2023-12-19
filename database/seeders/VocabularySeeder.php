<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Vocabulary;
use Illuminate\Database\Seeder;

class VocabularySeeder extends Seeder
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
                'name' => 'Family',
                'info' => '(Noun, Singular)',
                'audio' => '',
                'image' => '',
                'category_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id','!=',0)->inRandomOrder()->first()->id,
            ],
            [
                'name' => 'Mother',
                'info' => '(Noun, Singular)',
                'audio' => '',
                'image' => '',
                'category_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id','!=',0)->inRandomOrder()->first()->id,
            ],
            [
                'name' => 'Father',
                'info' => '(Noun, Singular)',
                'audio' => '',
                'image' => '',
                'category_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id','!=',0)->inRandomOrder()->first()->id,
            ],
            [
                'name' => 'Sister',
                'info' => '(Noun, Singular)',
                'audio' => '',
                'image' => '',
                'category_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id','!=',0)->inRandomOrder()->first()->id,
            ],
            [
                'name' => 'Brother',
                'info' => '(Noun, Singular)',
                'audio' => '',
                'image' => '',
                'category_id' => Category::select('id')->where('model',Vocabulary::class)->where('parent_id','!=',0)->inRandomOrder()->first()->id,
            ],
        ];

        foreach ($data as $d){
            Vocabulary::create($d);
        }
    }
}
