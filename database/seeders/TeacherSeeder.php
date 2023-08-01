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
            $newTeacher->phone_number = $faker-> randomElement(['3405673882', '1234567890',
            '2345678901',
            '3456789012',
            '4567890123',
            '5678901234',
            '6789012345',
            '7890123456',
            '8901234567',
            '9012345678',
            '0123456789',
            '1123456789',
            '2223456789',
            '3323456789',
            '4423456789',
            '5523456789',
            '6623456789',
            '7723456789',
            '8823456789',
            '9923456789',
            '0123456780',
            '0223456780',
            '0323456780',
            '0423456780',
            '0523456780',
            '0623456780',]);
            $newTeacher->cv = 'uploads/CV.pdf';
            $newTeacher->city = $userId[$i]->city;
            $newTeacher->address = $userId[$i]->address;
            $newTeacher->cap = $userId[$i]->cap;
            $newTeacher->profile_picture = 'uploads/' . $userId[$i]->name . '.jpg';
            $newTeacher->description = $faker->randomElement(['Sono un professore appassionato dell\'arte della comunicazione e mi piace coinvolgere gli studenti in dibattiti stimolanti. Cerco di creare un ambiente di apprendimento dinamico e inclusivo, dove ogni studente si senta valorizzato e motivato a esprimere le proprie idee.',
            'Amo la sfida di rendere le complesse teorie scientifiche accessibili a tutti gli studenti, incoraggiando la curiosità e l\'esplorazione. Nel mio insegnamento, enfatizzo l\'importanza della sperimentazione e dell\'approccio pratico per favorire una comprensione profonda e duratura dei concetti.',
            'La mia passione per l\'educazione si manifesta attraverso l\'uso creativo della tecnologia per migliorare l\'apprendimento e l\'insegnamento. Cerco costantemente nuovi metodi didattici per coinvolgere gli studenti e rendere le lezioni più coinvolgenti ed efficaci.',
            'Sono un sostenitore della pratica basata sull\'evidenza e mi impegno a fornire un ambiente di apprendimento sicuro e inclusivo per tutti. La mia filosofia di insegnamento si basa sulla collaborazione e sulla valorizzazione delle diverse prospettive, per favorire un apprendimento critico e consapevole.',
            'La mia passione per la conoscenza e l\'istruzione mi spinge a sfidare gli studenti a raggiungere il loro massimo potenziale. Cerco di fornire strumenti e risorse per aiutarli a superare le sfide e a sviluppare una mentalità resiliente e orientata al successo.',
            'Mi entusiasma ispirare i futuri leader attraverso lezioni coinvolgenti e la promozione di una mentalità imprenditoriale. Nelle mie lezioni, incoraggio gli studenti a sviluppare le loro capacità di problem-solving e a esplorare opportunità innovative.',
            'Creo un ambiente di classe in cui gli studenti sono incoraggiati a esplorare la loro creatività e scoprire nuovi modi di apprendere. Sono convinto che il processo di apprendimento debba essere coinvolgente e divertente, in modo che gli studenti si sentano motivati a esprimere il loro potenziale.',
            'La mia dedizione all\'insegnamento si traduce nella costruzione di una comunità di apprendimento collaborativa e solidale. In classe, promuovo la condivisione delle conoscenze e delle esperienze tra gli studenti, creando un ambiente in cui tutti si sentano coinvolti e coinvolti.',
            'La mia passione per la matematica si riflette nell\'istruzione personalizzata e nel supporto costante agli studenti. Credo che ogni studente abbia il potenziale per avere successo, e mi impegno a individuare i punti di forza di ciascuno e ad aiutarli a superare le difficoltà.',
            'Sono un sostenitore dell\'educazione come strumento per il cambiamento sociale e mi impegno per un mondo più giusto ed equo. Nelle mie lezioni, discutiamo di questioni sociali e culturali, incoraggiando gli studenti a riflettere sul loro ruolo nella società e a diventare agenti di cambiamento positivo.',
            'Mi piace coinvolgere gli studenti in dibattiti critici e incoraggiarli a sviluppare le proprie opinioni in modo consapevole. Nelle mie lezioni, valorizzo il pensiero critico e l\'analisi approfondita, incoraggiando gli studenti a sostenere le loro idee con prove solide e ben documentate.',
            'Il mio approccio all\'insegnamento si basa sull\'integrazione di conoscenze tradizionali e nuove prospettive culturali. Cerco di fornire un quadro completo dei temi trattati, incoraggiando gli studenti a esplorare diverse fonti di informazione e ad abbracciare la diversità di pensiero.',
            'La mia passione per la letteratura si traduce in un\'esplorazione profonda del significato e delle emozioni nelle opere. Mi piace incoraggiare gli studenti a immergersi nelle storie e a scoprire il potere delle parole nel plasmare la nostra comprensione del mondo.',
            'Sono un sostenitore della didattica esperienziale e della pratica come strumento per la crescita personale e professionale. Nelle mie lezioni, promuovo l\'apprendimento attraverso l\'esperienza diretta e l\'applicazione pratica dei concetti teorici.',
            'Mi impegno a sviluppare la capacità critica degli studenti per prepararli a diventare cittadini consapevoli e attivi. Nelle mie lezioni, affrontiamo tematiche di attualità e incoraggio gli studenti a esaminare in modo critico le informazioni che ricevono.',
            'Sono appassionato di storia e mi dedico a rendere il passato accessibile e rilevante per le nuove generazioni. Nelle mie lezioni, utilizzo storie coinvolgenti e approcci creativi per far rivivere il passato e promuovere la comprensione delle dinamiche storiche.',
            'La mia missione è fornire un ambiente di apprendimento stimolante e inclusivo per tutti gli studenti. Cerco di creare un clima di classe in cui ogni voce sia ascoltata e rispettata, e dove ciascuno possa esprimere la propria creatività e curiosità.',
            'Sono un sostenitore della diversità e dell\'inclusione e promuovo un dialogo aperto e rispettoso nella classe. Credo che la diversità sia una risorsa preziosa e cerco di creare un ambiente in cui gli studenti possano esprimere liberamente le loro identità e prospettive.',
            'Mi piace sfidare gli studenti a pensare fuori dagli schemi e a esplorare nuove prospettive scientifiche. Nelle mie lezioni, incoraggio il pensiero laterale e la curiosità, stimolando gli studenti a formulare domande e a trovare soluzioni originali.',
            'La mia dedizione alla ricerca e all\'innovazione si riflette nel modo in cui affronto l\'insegnamento e l\'apprendimento. Mi piace coinvolgere gli studenti in progetti di ricerca e incoraggiarli a esplorare nuove frontiere del sapere.',
            'Sono appassionato di musica e cerco di ispirare gli studenti attraverso le emozioni e l\'arte del suono. Nelle mie lezioni, utilizzo la musica come strumento per esplorare tematiche culturali e per stimolare la creatività e l\'espressione individuale.',
            'La mia filosofia di insegnamento si basa sull\'equilibrio tra teoria e pratica per un apprendimento duraturo. Cerco di fornire una base solida di conoscenze teoriche, ma allo stesso tempo incoraggio gli studenti a mettere in pratica ciò che hanno imparato.',
            'Mi dedico a incoraggiare la collaborazione e la condivisione delle conoscenze tra gli studenti. Nelle mie lezioni, promuovo l\'apprendimento cooperativo e la condivisione di esperienze, perché credo che il dialogo tra pari sia un elemento essenziale del processo di apprendimento.',
            'Sono un sostenitore dell\'educazione come strumento per la crescita personale e la realizzazione dei propri obiettivi. Nelle mie lezioni, incoraggio gli studenti a riflettere sulle loro ambizioni e a sviluppare un piano d\'azione per raggiungerle.',
            'La mia passione per l\'insegnamento si riflette nella cura e nell\'attenzione individualizzata per ogni studente. Cerco di capire le esigenze e gli interessi di ciascun allievo, perché credo che un approccio personalizzato sia fondamentale per il loro successo accademico.',]);
            $newTeacher->price = $faker->randomElement([99, 30, 88, 10, 50, 34, 55, 22, 29]);
            $newTeacher->remote = $faker->randomElement(['1', '0']);
            $newTeacher->timestamps = false;
            $newTeacher->save();

            $teacherIds[] = $newTeacher->id;
        }

        // Seed the subject_teacher pivot table
        for ($i = 0; $i < count($userId)*5; $i++) {
            $teacherId = $faker->randomElement($teacherIds);
            $subject = Subject::inRandomOrder()->first();
            $subject->teachers()->attach($teacherId);
        }
    }
}
