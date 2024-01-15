<?php

namespace Database\Seeders;

use App\Models\Ball;
use App\Models\Day;
use App\Models\Exercise;
use App\Models\Media;
use App\Models\Test;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $day_id = 5;

    public function run(): void
    {
        $exercise = Exercise::create([
            'day_id' => $this->day_id,
            'type' => 1,
            'name' => "Task 1",
            'question_count' => 3,
            'title' => '',
            'description' => '',
            'status' => 1,
        ]);

        Ball::create([
            'model' => Exercise::class,
            'model_id' => $exercise->id,
            'table' => Test::class,
            'scores' => 20,
            'coins' => 15,
        ]);

        $tests = [
            [
                'exercise_id' => $exercise->id,
                'title' => 'Choose the correct option.',
                'question' => "Do you think the animals <recognize>",
                'option_1' => 'recognize',
                'option_2' => 'believe',
                'option_3' => 'remind',
                'answer' => 3,
                'status' => 1,
            ],
            [
                'exercise_id' => $exercise->id,
                'title' => 'Choose the correct option.',
                'question' => "Do you <believe> anybody who likes cleaning could do your job?",
                'option_1' => 'believe',
                'option_2' => 'remind',
                'option_3' => 'wonder',
                'answer' => 1,
                'status' => 1,
            ],
            [
                'exercise_id' => $exercise->id,
                'title' => 'Choose the correct option.',
                'question' => "Have you ever <realized> that you were risking your life because you were too close too the heat?",
                'option_1' => 'believe',
                'option_2' => 'realized',
                'option_3' => 'wonder',
                'answer' => 2,
                'status' => 1,
            ],
        ];
        foreach ($tests as $t) {
            $test = Test::create($t);
            Media::create([
                'model' => Test::class,
                'model_id' => $test->id,
                'data' => 'image.jpeg',
                'type' => 1,
                'status' => 1,
            ]);
        }

        $exercise_2 = Exercise::create([
            'day_id' => $this->day_id,
            'type' => 2,
            'name' => "Task 2",
            'question_count' => 3,
            'title' => "Complete the text with the correct form of the following words: believe, expect, realize, recognize, remember, remind, wonder.",
            'description' => "Well, usually they are fine: but after some time, you learn to <believe> the signs that they are stressed, like the way they walk or the sounds they make.
Yes! I usually make a noise or something. I <expect> once a couple were having a terrible argument, and when they saw me, they just kept going!.
I wasn't <realize> it - I didn't even have my uniform on!. When I started, my colleagues always <remember> me to stay at a safedistance.",
            'status' => 1,
        ]);
        Ball::create([
            'model' => Exercise::class,
            'model_id' => $exercise_2->id,
            'table' => Test::class,
            'scores' => 20,
            'coins' => 15,
        ]);
    }
}
