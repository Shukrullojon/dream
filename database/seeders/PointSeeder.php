<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Point;
use App\Models\User;
use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach ($users as $user){
            for ($i=0; $i<4; $i++){
                Point::firstOrCreate([
                    'model' => Module::class,
                    'model_id' => Module::select('id')->inRandomOrder()->first()->id,
                    'user_id' => $user->id,
                    'status' => rand(0,1),
                    'point' => rand(0,1),
                ]);
            }
        }
    }
}
