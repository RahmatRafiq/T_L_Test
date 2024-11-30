<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ingredient::create(['name' => 'Nasi', 'unit' => 'piring']);
        Ingredient::create(['name' => 'Telor', 'unit' => 'buah']);
        Ingredient::create(['name' => 'Minyak', 'unit' => 'secukupnya']);
        Ingredient::create(['name' => 'Bawang Merah', 'unit' => 'siung']);
        Ingredient::create(['name' => 'Bawang Putih', 'unit' => 'siung']);
        Ingredient::create(['name' => 'Ayam', 'unit' => 'secukupnya']);
        Ingredient::create(['name' => 'Sayur Cesim', 'unit' => 'helai']);
        Ingredient::create(['name' => 'Kecap', 'unit' => 'secukupnya']);
        Ingredient::create(['name' => 'Garam', 'unit' => 'secukupnya']);
    }
}
