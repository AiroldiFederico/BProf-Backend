<?php

namespace Database\Seeders;

use App\Models\Admin\Teacher;
use App\Models\Admin\Sponsorship;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipTeacherSeeder extends Seeder
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
                'teacher_id' => 1,
                'sponsorship_id' => 1,
                'start_date' => now()->setTimezone('Europe/Rome'),
                'end_date' => now()->setTimezone('Europe/Rome')->addHours(24),
            ],
            [
                'teacher_id' => 10,
                'sponsorship_id' => 3,
                'start_date' => now()->setTimezone('Europe/Rome'),
                'end_date' => now()->setTimezone('Europe/Rome')->addHours(144),
            ],
            [
                'teacher_id' => 30,
                'sponsorship_id' => 2,
                'start_date' => now()->setTimezone('Europe/Rome'),
                'end_date' => now()->setTimezone('Europe/Rome')->addHours(72),
            ],
            [
                'teacher_id' => 33,
                'sponsorship_id' => 1,
                'start_date' => now()->setTimezone('Europe/Rome'),
                'end_date' => now()->setTimezone('Europe/Rome')->addHours(24),
            ],
            [
                'teacher_id' => 50,
                'sponsorship_id' => 3,
                'start_date' => now()->setTimezone('Europe/Rome'),
                'end_date' => now()->setTimezone('Europe/Rome')->addHours(144),
            ],
            [
                'teacher_id' => 22,
                'sponsorship_id' => 2,
                'start_date' => now()->setTimezone('Europe/Rome'),
                'end_date' => now()->setTimezone('Europe/Rome')->addHours(72),
            ],
            
        ];

        DB::table('sponsorship_teacher')->insert($data);
    }
}