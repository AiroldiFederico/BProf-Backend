<?php

namespace Database\Seeders;

use App\Models\Admin\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsor = [
            [
                'name' => 'Gold',
                'price' => 9.99,
                'duration' => 144
            ],
            [
                'name' => 'Silver',
                'price' => 5.99,
                'duration' => 72
            ],
            [
                'name' => 'Bronze',
                'price' => 2.99,
                'duration' => 24
            ],
        ];

        foreach ($sponsor as $elem) {
            $newSponsor = new Sponsorship();
            $newSponsor->name = $elem['name'];
            $newSponsor->price = $elem['price'];
            $newSponsor->duration = $elem['duration'];
            $newSponsor->save();
        }
    }
}
