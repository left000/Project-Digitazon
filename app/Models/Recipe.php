<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'servings',
        'difficulty',
        'prep_time',
        'cook_time',
        'total_time',
        'user_id'
    ];
    public function ingredients() { 
        return $this->belongsToMany('App\Models\Ingredient', 'recipe_ingredients');
        }

    public function usersLiked()
    {
        return $this->beLongsToMany('App\Models\User', 'likes');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function instructions()
    {
        return $this->hasMany('App\Models\Instruction');
    }
    public function user()
    {
        return $this->beLongsTo('App\Models\User');
    }

}
