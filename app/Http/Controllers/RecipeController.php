<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('category', 'ingredients')->get();
        return inertia('Recipes/Index', compact('recipes'));
    }

    public function create()
    {
        $categories = Category::all();
        $ingredients = Ingredient::all();
        return inertia('Recipes/Create', compact('categories', 'ingredients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'instructions' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'ingredients' => 'required|array',
            'ingredients.*.ingredient_id' => 'required|exists:ingredients,id',
            'ingredients.*.quantity' => 'required|string',
        ]);

        $recipe = Recipe::create($request->only('name', 'instructions', 'category_id'));

        foreach ($request->ingredients as $ingredient) {
            $recipe->ingredients()->attach($ingredient['ingredient_id'], ['quantity' => $ingredient['quantity']]);
        }

        return redirect()->route('recipes.index');
    }

    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        $ingredients = Ingredient::all();
        return inertia('Recipes/Edit', compact('recipe', 'categories', 'ingredients'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'instructions' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'ingredients' => 'required|array',
            'ingredients.*.ingredient_id' => 'required|exists:ingredients,id',
            'ingredients.*.quantity' => 'required|string',
        ]);

        $recipe->update($request->only('name', 'instructions', 'category_id'));

        $recipe->ingredients()->detach();

        foreach ($request->ingredients as $ingredient) {
            $recipe->ingredients()->attach($ingredient['ingredient_id'], ['quantity' => $ingredient['quantity']]);
        }

        return redirect()->route('recipes.index');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('recipes.index');
    }
}
