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
            'Algoritmi',
            'Archeologia',
            'Architettura',
            'Arte',
            'Astronomia',
            'Biochimica',
            'Biologia',
            'Chimica',
            'Cinema',
            'Criminologia',
            'Design',
            'Diritto',
            'Economia',
            'Educazione fisica',
            'Elettronica',
            'Farmacologia',
            'Filosofia',
            'Finanza',
            'Fisica',
            'Geografia',
            'Grafica',
            'Informatica',
            'Inglese',
            'Italiano',
            'Letteratura',
            'Marketing',
            'Matematica',
            'Musica',
            'Neuroscienze',
            'Politica',
            'Programmazione',
            'Psicologia',
            'Religione',
            'Reti',
            'Scienze',
            'Sicurezza informatica',
            'Sociologia',
            'Storia',
            'Teatro',
            'Web development',
        ];

        foreach ($subjects as $elem) {
            $newSub = new Subject();
            $newSub->name = $elem;
            $newSub->slug = Str::slug($newSub->name, '-');
            $newSub->save();
        }
    }
}
