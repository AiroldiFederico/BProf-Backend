<?php

namespace Database\Seeders;

use App\Models\Admin\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
                'Matematica',
                'Italiano',
                'Storia',
                'Geografia',
                'Scienze',
                'Inglese',
                'Arte',
                'Musica',
                'Educazione Fisica',
                'Tecnologia',
                'Religione',
                'Informatica',
        ];

        foreach ($subjects as $elem) {
            $newSub = new Subject();
            $newSub->name = $elem;
            $newSub->slug = Str::slug($newSub->name, '-');
            $newSub->save();
        }
    }
}
