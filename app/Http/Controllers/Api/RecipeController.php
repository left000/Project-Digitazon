<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\User;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $user_liked_recipes = $user->likedRecipes;
        $user_liked_recipes_id = [];
        foreach ($user_liked_recipes as $user_liked_recipe){
            $user_liked_recipes_id[] = $user_liked_recipe->id;
        }

        $recipes = Recipe::all();


        foreach ($recipes as $recipe) {
            $recipe->user;
            $recipe->comments;
            foreach ($recipe->comments as $comment){
                $comment->user;
            }
            if(in_array($recipe->id, $user_liked_recipes_id)) {
                
                $recipe->liked = true;
            }else{
                $recipe->liked = false;
            }
            
            
        }
        return $recipes;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'description' => 'required', "image" => 'required', "servings" => 'required',
        'prep_time' => 'required', 'cook_time' => 'required', 'total_time' => 'required', 'difficulty' => 'required',
        'user_id' => 'required']);
        Recipe::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'servings' => $request->servings,
            'prep_time' => $request->prep_time,
            'cook_time' => $request->cook_time,
            'difficulty' => $request->difficulty,
            'total_time' => $request->total_time,
            'user_id' => $request->user_id
        ]);

        return ['success' => 'Recipe created successfully!!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return $recipe;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe = Recipe::find($recipe->id);
        if(!$recipe) return ['error' => 'recipe is not present'];
        $recipe->delete();
        return ['success' => 'Recipe deleted successfully :(!'];
    }
}
