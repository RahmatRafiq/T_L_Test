<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return inertia('Ingredients/Index', compact('ingredients'));
    }

    public function create()
    {
        return inertia('Ingredients/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
        ]);

        Ingredient::create($request->only('name', 'unit'));

        return redirect()->route('ingredients.index');
    }

    public function edit(Ingredient $ingredient)
    {
        return inertia('Ingredients/Edit', compact('ingredient'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
        ]);

        $ingredient->update($request->only('name', 'unit'));

        return redirect()->route('ingredients.index');
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('ingredients.index');
    }
}

