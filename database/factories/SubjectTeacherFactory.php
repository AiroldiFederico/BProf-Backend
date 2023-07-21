<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectTeacherFactory extends Factory
{
    public function modelName()
    {
        return 'App\Models\Admin\SubjectTeacher';
    }

    public function definition()
    {
        return [
            'subject_id' => $this->faker->randomDigitNotZero(3),
            'teacher_id' => $this->faker->randomDigitNotZero(2),
        ];
    }

    protected function fillable()
    {
        return ['subject_id', 'teacher_id'];
    }
}
