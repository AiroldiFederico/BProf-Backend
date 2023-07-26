<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Teacher;
use App\Models\Admin\Subject;
use App\Models\User;
use Faker\Generator as Faker;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $teacherIds = [];
        $userId = User::all();

        for ($i = 0; $i < count($userId); $i++) {
            $newTeacher = new Teacher();
            $newTeacher->user_id = $userId[$i]->id;
            $newTeacher->phone_number = $faker->phoneNumber;
            $newTeacher->city = $faker->city;
            $newTeacher->address = $faker->address;
            $newTeacher->cap = $faker->randomDigit(5);
            $newTeacher->description = $faker->paragraph;
            $newTeacher->price = $faker->randomFloat(2, 10, 100);
            $newTeacher->remote = $faker->boolean;
            $newTeacher->timestamps = false;
            $newTeacher->save();

            $teacherIds[] = $newTeacher->id;
        }

        // Seed the subject_teacher pivot table
        for ($i = 0; $i < count($userId); $i++) {
            $teacherId = $faker->randomElement($teacherIds);
            $subject = Subject::inRandomOrder()->first();
            $subject->teachers()->attach($teacherId);
        }
    }
}
