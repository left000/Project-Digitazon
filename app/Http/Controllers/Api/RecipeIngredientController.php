<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RecipeIngredient;
use Illuminate\Http\Request;

class RecipeIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recupero di tutti i collegamenti tra ricette e ingredienti
        $recipeIngredients = RecipeIngredient::all();

        // Restituzione della risposta appropriata
        return[
            'message' => 'Collegamenti tra ricette e ingredienti recuperati con successo',
            'recipeIngredient' => $recipeIngredients
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required',
            'ingredient_id' => 'required',
            'quantity' => 'required',
        ]);

        $recipeIngredient = RecipeIngredient::create([
            'recipe_id' => $request->recipe_id,
            'ingredient_id' => $request->ingredient_id,
            'quantity' => $request->quantity,
        ]);

        // Restituzione della risposta appropriata
                return ["success" => "Comment created successfully", "recipeIngredient" => $recipeIngredient];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function show(RecipeIngredient $recipeIngredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecipeIngredient $recipeIngredient)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecipeIngredient $recipeIngredient)
    {
    }
}
