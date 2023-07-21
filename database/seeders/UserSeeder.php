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
        $arrayUser = [
            ['nome' => 'John',
            'cognome' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password123',
            'indirizzo' => 'Via delle Rose, 12',
            'cap' => '12100',
            'citta' => 'Roma'],

            ['nome' => 'Alice',
            'cognome' => 'Johnson',
            'email' => 'alice.johnson@example.com',
            'password' => 'pass1234',
            'indirizzo' => '123 Elm Street',
            'cap' => '54321',
            'citta' => 'Springfield'],

            ['nome' => 'Bob',
            'cognome' => 'Anderson',
            'email' => 'bob.anderson@example.com',
            'password' => 'qwerty123',
            'indirizzo' => '456 Oak Avenue',
            'cap' => '98765',
            'citta' => 'Maplewood'],

            ['nome' => 'Eva',
            'cognome' => 'Garcia',
            'email' => 'eva.garcia@example.com',
            'password' => 'myp@ssw0rd',
            'indirizzo' => '789 Pine Lane',
            'cap' => '24680',
            'citta' => 'Sunnydale'],

            [
                'nome' => 'Michael',
                'cognome' => 'Brown',
                'email' => 'michael.brown@example.com',
                'password' => 'brownie321',
                'indirizzo' => '10 Willow Lane',
                'cap' => '13579',
                'citta' => 'Oakville'
            ],
            [
                'nome' => 'Sophia',
                'cognome' => 'Lee',
                'email' => 'sophia.lee@example.com',
                'password' => 'sophie456',
                'indirizzo' => '246 Cherry Street',
                'cap' => '86420',
                'citta' => 'Roseville'
            ],
            [
                'nome' => 'Daniel',
                'cognome' => 'Martinez',
                'email' => 'daniel.martinez@example.com',
                'password' => 'danny789',
                'indirizzo' => '789 Maple Road',
                'cap' => '12345',
                'citta' => 'Mapleton'
            ],
            [
                'nome' => 'Olivia',
                'cognome' => 'White',
                'email' => 'olivia.white@example.com',
                'password' => 'olive12',
                'indirizzo' => '567 Oak Street',
                'cap' => '97531',
                'citta' => 'Chestnut City'
            ],
            [
                'nome' => 'David',
                'cognome' => 'Lopez',
                'email' => 'david.lopez@example.com',
                'password' => 'dave987',
                'indirizzo' => '321 Pine Avenue',
                'cap' => '54321',
                'citta' => 'Willowville'
            ],
            [
                'nome' => 'Emily',
                'cognome' => 'Taylor',
                'email' => 'emily.taylor@example.com',
                'password' => 'emtay2023',
                'indirizzo' => '789 Birch Lane',
                'cap' => '56789',
                'citta' => 'Woodville'
            ],

        ];

        foreach ($arrayUser as $elem) {
            $newUser = new User();
            $newUser->name = $elem['nome'];
            $newUser->surname = $elem['cognome'];
            $newUser->city = $elem['citta'];
            $newUser->address = $elem['indirizzo'];
            $newUser->cap = $elem['cap'];
            $newUser->subject = $elem['nome'];
            $newUser->email = $elem['email'];
            $newUser->password = $elem['password'];
            $newUser->save();
        }


    }
}
