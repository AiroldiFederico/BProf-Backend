<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Review;
use Faker\Generator as Faker;

// library to use Laravel Helper
use Illuminate\Support\Str; 

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    
        for ($i = 0; $i < 50; $i++) {
            $newReview = new Review();
            $newReview->teacher_id = $faker->numberBetween(1, 5);
            $newReview->description = $faker->paragraph;
            $newReview->rate = $faker->numberBetween(1, 5);
            $newReview->guest_name = $faker->name;
            $newReview->guest_email = $faker->email;
            $newReview->save();
        }
    }
}
