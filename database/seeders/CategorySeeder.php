<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'title' => 'Clubavond',
            'slug' => 'clubavond',
            'active' => '1',
        ]);

        Category::create([
            'title' => 'Internationaal Toernooi ',
            'slug' => 'internationaal_toernooi',
            'active' => '1',
        ]);
    }
}
