<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            "user_id" => "required", 
            "recipe_id" => "required"
        ]);

        $same_likes = Like::where('user_id', $request->user_id)->where('recipe_id', $request->recipe_id)->get();

        if(!$same_likes->isEmpty()){
            return ["failed" => "like already exist!"];
        }

        Like::create([
            "user_id" => $request->user_id,
            "recipe_id" => $request->recipe_id,
        ]);
        return["success" => "Like created Successfully"];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        $like = Like::find($like->id);
        if(!$like) return["error" => "like does not exist!"];
        $like->delete();
        return ["success" => "Like deleted"];
    }

    public function dislike(Request $request)
    {
        $request->validate([
            "user_id" => "required",
            "recipe_id" => "required"
        ]);

        $like = Like::where('user_id', $request->user_id)->where('recipe_id', $request->recipe_id)->get();
        if($like->isEmpty()) return["error" => "like does not exist!"];

        $like[0]->delete();
        return ["success" => "Like deleted"];
    }

}
