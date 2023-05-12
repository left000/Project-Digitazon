<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\RecipeIngredient;

class RecipeIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $recipe_id = $request->id;
        $recipeIngredients = RecipeIngredient::where("recipe_id", $recipe_id)->get(); 
        return view('recipeIngredients.index', [
        "recipeIngredients" => $recipeIngredients, 
        "recipe_id" => $recipe_id ]);

    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ingredients = Ingredient::all();
        
        return view('recipeIngredients.create', ["id" => $request->id, 'ingredients' => $ingredients]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(['recipe_id' => 'required']);
        $request->validate(['ingredient_id' => 'required']);
        $request->validate(['quantity' => 'required']);
        $recipe = Recipe::find($request->recipe_id);
        $ingredient = Ingredient::find($request->ingredient_id);
        $recipeIngredient = RecipeIngredient::create([
            'recipe_id' => $request->recipe_id, 
            'ingredient_id' => $request->ingredient_id, 
            'quantity' => $request->quantity, 
        ]);
        return redirect()->route('recipeIngredients.index', [ 
        "id" => $request->recipe_id,
        "ingredient" =>$ingredient, 
        "recipeIngredient" => $recipeIngredient ] );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(RecipeIngredient $recipeIngredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RecipeIngredient $recipeIngredient)
    {   
        $ingredient = $recipeIngredient->ingredient;
        $ingredients = Ingredient::all();
        return view('recipeIngredients.edit', [
        "id" => $recipeIngredient->recipe_id, 
        'ingredients' => $ingredients, 
        'ingredient' => $ingredient,
        'recipeIngredient' => $recipeIngredient ]); 
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecipeIngredient $recipeIngredient)
    {
        $request->validate(['recipe_id' => 'required']);
        $request->validate(['ingredient_id' => 'required']);
        $request->validate(['quantity' => 'required']);     	
        $recipeIngredient->update([
            'recipe_id' => $request->recipe_id,
            'ingredient_id' => $request->ingredient_id,
            'quantity' => $request->quantity,
            ]);         	
            return redirect()->route('recipeIngredients.index', [ "id" => $request->recipe_id ] );

    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RecipeIngredient $recipeIngredient)
    {
        $recipeIngredient->delete();     
        $request->validate(['recipe_id' => 'required']);
        $request->validate(['ingredient_id' => 'required']);
        $request->validate(['quantity' => 'required']); 
        $recipe = Recipe::find($request->recipe_id);	
        return redirect()->route('recipeIngredients.index',
        ["id" => $request->recipe_id,
        "instructions" => $recipe->instructions, 
        "instruction_id" => $instruction_id->id,
        'success' => 'recipeIngredient deleted successfully!']);
    }
}
