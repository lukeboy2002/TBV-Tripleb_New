<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sponsor::create([
            'name' => 'Bouwgroep Midden Brabant',
            'link' => 'https://www.bouwgroep-mb.nl/',
            'image' => '/sponsors/1.jpeg',
            'active' => '1',
        ]);

        Sponsor::create([
            'name' => 'Engel',
            'link' => 'https://nl.linkedin.com/in/patrick-engel-a6008314',
            'image' => '/sponsors/2.png',
            'active' => '1',
        ]);
    }
}
