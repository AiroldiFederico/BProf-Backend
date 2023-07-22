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
        for ($i = 0; $i < 100; $i++) {
            $user = array(
                'nome' => $faker->firstName,
                'cognome' => $faker->lastName,
                'email' => $faker->email,
                'password' => $faker->password,
                'indirizzo' => $faker->address,
                'cap' => $faker->postcode,
                'citta' => $faker->city,
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
