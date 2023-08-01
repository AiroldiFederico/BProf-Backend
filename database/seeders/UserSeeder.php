<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $usersArray = array();
        for ($i = 0; $i < 25; $i++) {
            $user = array(
                'nome' => $faker->unique()->randomElement(['Alessio',
                'Sofia',
                'Lorenzo',
                'Giulia',
                'Matteo',
                'Emma',
                'Andrea',
                'Chiara',
                'Francesco',
                'Greta',
                'Gabriele',
                'Alice',
                'Riccardo',
                'Martina',
                'Davide',
                'Anna',
                'Simone',
                'Camilla',
                'Mattia',
                'Sara',
                'Luca',
                'Eleonora',
                'Leonardo',
                'Valentina',
                'Marco',]),
                'cognome' => $faker->unique()->randomElement(['Rossi',
                'Bianchi',
                'Ferrari',
                'Esposito',
                'Ricci',
                'Marini',
                'Conti',
                'De Luca',
                'Bruno',
                'Galli',
                'Rizzo',
                'Marchetti',
                'Romano',
                'Mancini',
                'Silva',
                'Moretti',
                'Barbieri',
                'Fontana',
                'Santoro',
                'Caruso',
                'Russo',
                'Lombardi',
                'Costa',
                'Guerriero',
                'Parisi',]),
                'email' => $faker->email,
                'password' => $faker->randomElement(['ciaociao']),
                'indirizzo' => $faker->randomElement(['Livorno, 13',
                'Milano, 10',
                'Napoli, 5',
                'Torino, 23',
                'Palermo, 7',
                'Genova, 15',
                'Bologna, 4',
                'Firenze, 12',
                'Bari, 8',
                'Catania, 33',
                'Venezia, 11',
                'Verona, 6',
                'Messina, 19',
                'Padova, 20',
                'Trieste, 14',
                'Brescia, 2',
                'Prato, 26',
                'Taranto, 9',
                'Reggio Calabria, 17',
                'Modena, 22',
                'Parma, 30',
                'Reggio Emilia, 27',
                'Perugia, 18',
                'Ravenna, 16',
                'Roma, 1',]),
                'cap' => $faker->randomElement(['57123',
                '20121',
                '80121',
                '10121',
                '90121',
                '16121',
                '40121',
                '50121',
                '70121',
                '95121',
                '30121',
                '37121',
                '98121',
                '35121',
                '34121',
                '25121',
                '59100',
                '74121',
                '89121',
                '41121',
                '43121',
                '42121',
                '06121',
                '48121',
                '33100',]),
                'citta' => $faker->randomElement(['Roma',
                'Milano',
                'Napoli',
                'Torino',
                'Palermo',
                'Genova',
                'Bologna',
                'Firenze',
                'Bari',
                'Catania',
                'Venezia',
                'Verona',
                'Messina',
                'Padova',
                'Trieste',
                'Brescia',
                'Prato',
                'Taranto',
                'Reggio Calabria',]),
                'materia' => $faker->randomElement(['Matematica', 'Scienze', 'Storia', 'Italiano', 'Inglese'])
            );
            $usersArray[] = $user;
        }

        foreach ($usersArray as $elem) {
            $newUser = new User();
            $newUser->name = $elem['nome'];
            $newUser->surname = $elem['cognome'];
            $newUser->city = $elem['citta'];
            $newUser->address = $elem['indirizzo'];
            $newUser->cap = $elem['cap'];
            $newUser->subject = $elem['materia'];
            $newUser->email = $elem['email'];
            $newUser->password = $elem['password'];
            $newUser->save();
        }


    }
}
