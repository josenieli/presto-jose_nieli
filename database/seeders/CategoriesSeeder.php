<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public $categories = [
    'Motori',
    'Elettronica',
    'Immobili',
    'Lavoro',
    'Moda',
    'Casa e giardino',
    'Sport e hobby',
    'Animali',
    'Servizi',
];

    public function run(): void
    {
        foreach ($this->categories as $category) {
        Category::create(['name' => $category]);
        }    
    }
}
