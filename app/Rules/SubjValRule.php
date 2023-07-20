<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SubjValRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $allSubjects = [
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

        return in_array($value, $allSubjects);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Seleziona una materia valida';
    }
}
