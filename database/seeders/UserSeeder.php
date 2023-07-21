<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function generateRandomPassword($length = 8) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = '';
            for ($i = 0; $i < $length; $i++) {
                $password .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $password;
        }
        
        $usersArray = array();
        for ($i = 0; $i < 50; $i++) {
            $user = array(
                'nome' => 'Nome' . ($i + 1),
                'cognome' => 'Cognome' . ($i + 1),
                'email' => 'email' . ($i + 1) . '@example.com',
                'password' => generateRandomPassword(),
                'indirizzo' => 'Indirizzo ' . ($i + 1),
                'cap' => rand(10000, 99999),
                'citta' => 'Città ' . ($i + 1),
                'materia' => 'Materia ' . ($i + 1), // Campo fittizio "materia"
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
