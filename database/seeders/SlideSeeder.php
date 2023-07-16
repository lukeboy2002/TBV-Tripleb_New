<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slide::create([
            'title' => 'TBV-TripleB',
            'subtitle' => 'Welkome op onze nieuwe site',
            'image' => 'slides/1.jpg',
            'active' => '1',
        ]);

        Slide::create([
            'title' => 'TBV-TripleB',
            'subtitle' => 'Lets Play',
            'image' => 'slides/2.jpg',
            'active' => '1',
        ]);
    }
}
