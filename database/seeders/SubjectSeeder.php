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
            'Anatomia',
            'Antropologia culturale',
            'Antropologia',
            'Archeologia',
            'Architettura',
            'Arte',
            'Astronomia',
            'Biochimica',
            'Biologia marina',
            'Biologia',
            'Botanica',
            'Chimica',
            'Cinema',
            'Climatologia',
            'Contabilita\'',
            'Criminologia',
            'Database',
            'Design',
            'Diritto amministrativo',
            'Diritto civile',
            'Diritto commerciale',
            'Diritto costituzionale',
            'Diritto del lavoro',
            'Diritto internazionale',
            'Diritto penale',
            'Diritto tributario',
            'Diritto',
            'Ecologia',
            'Economia del lavoro',
            'Economia internazionale',
            'Economia politica',
            'Economia',
            'Educazione fisica',
            'Elettronica',
            'Energia',
            'Epistemologia',
            'Etica',
            'Farmacologia',
            'Filosofia antica',
            'Filosofia contemporanea',
            'Filosofia del linguaggio',
            'Filosofia dell\'arte',
            'Filosofia della mente',
            'Filosofia della scienza',
            'Filosofia medievale',
            'Filosofia moderna',
            'Filosofia politica',
            'Filosofia',
            'Finanza',
            'Fisica',
            'Fisiologia',
            'Genetica',
            'Geografia',
            'Geologia',
            'Gestione aziendale',
            'Grafica',
            'Informatica',
            'Inglese',
            'Intelligenza artificiale',
            'Italiano',
            'Letteratura cinese',
            'Letteratura classica',
            'Letteratura francese',
            'Letteratura giapponese',
            'Letteratura inglese',
            'Letteratura italiana',
            'Letteratura russa',
            'Letteratura spagnola',
            'Letteratura tedesca',
            'Letteratura',
            'Logica',
            'Macroeconomia',
            'Marketing',
            'Matematica',
            'Metafisica',
            'Meteorologia',
            'Microbiologia',
            'Microeconomia',
            'Musica',
            'Narrativa',
            'Neuroscienze',
            'Oceanografia',
            'Poesia',
            'Politica',
            'Programmazione',
            'Psicologia',
            'Realta\' virtuale',
            'Religione',
            'Reti',
            'Robotica',
            'Romanzi',
            'Saggistica',
            'Scienze',
            'Sicurezza informatica',
            'Sociologia',
            'Sostenibilita\'',
            'Storia antica',
            'Storia contemporanea',
            'Storia dell\'Africa',
            'Storia dell\'Asia',
            'Storia dell\'arte',
            'Storia delle Americhe',
            'Storia medievale',
            'Storia moderna',
            'Storia',
            'Sviluppo app',
            'Teatro',
            'Web development',
            'Zoologia',
        ];

        foreach ($subjects as $elem) {
            $newSub = new Subject();
            $newSub->name = $elem;
            $newSub->slug = Str::slug($newSub->name, '-');
            $newSub->save();
        }
    }
}
