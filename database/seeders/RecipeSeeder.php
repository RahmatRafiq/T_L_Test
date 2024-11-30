<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        $category = Category::where('name', 'Main Course')->first();

        $recipe = Recipe::create([
            'name' => 'Nasi Goreng',
            'instructions' => 'Langkah-langkah membuat Nasi Goreng...',
            'category_id' => $category->id,
        ]);

        $recipe->ingredients()->attach([
            Ingredient::where('name', 'Nasi')->first()->id => ['quantity' => '1 piring'],
            Ingredient::where('name', 'Telor')->first()->id => ['quantity' => '2 buah'],
            Ingredient::where('name', 'Minyak')->first()->id => ['quantity' => 'secukupnya'],
            Ingredient::where('name', 'Bawang Merah')->first()->id => ['quantity' => '5 siung'],
            Ingredient::where('name', 'Bawang Putih')->first()->id => ['quantity' => '5 siung'],
            Ingredient::where('name', 'Ayam')->first()->id => ['quantity' => 'secukupnya'],
            Ingredient::where('name', 'Sayur Cesim')->first()->id => ['quantity' => '5 helai'],
            Ingredient::where('name', 'Kecap')->first()->id => ['quantity' => 'secukupnya'],
            Ingredient::where('name', 'Garam')->first()->id => ['quantity' => 'secukupnya'],
        ]);
    }
}
