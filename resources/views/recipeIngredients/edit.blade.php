@extends('layouts.app')

@section('content')

<div class="container text-center">
    <form action="{{ route('recipeIngredients.update', $recipeIngredient) }}" method="POST">     
        @method('PUT') 
        @csrf     	
        <input type="hidden" name="recipe_id" id="recipe_id" value="{{ $id }}" class="form-control mb-2">
        <label for="ingredient_id" class="mb-1">Ingrediente</label>
        <select name="ingredient_id" id="ingredient_id" class="form-control mb-2">
            <option value="">--Scegli l'ingrediente--</option>
            @foreach ($ingredients as $ingredient)
                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
            @endforeach
        </select>
        <label for="quantity" class="mb-1">Quantità</label>
        <input type="text" name="quantity" id="quantity" class="form-control mb-2">           
        <button type="submit" class="btn btn-warning">Cambia</button>    
    </form> 
</div>
@endsection

