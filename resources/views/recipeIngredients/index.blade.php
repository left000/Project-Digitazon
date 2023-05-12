@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center">
        <h3>Ingredienti della Ricetta:  {{ $recipeIngredients[0]->recipe->name }}</h3>
        <a href="{{ route('recipeIngredients.create') }}?id={{ $recipe_id }}" class="btn btn-success btn-sm">Creare</a>
    </div>
    <table class="table car">
        <thead>
            <th>Ingredienti</th>
            <th>Quantità</th>
        </thead>
        <tbody>@foreach($recipeIngredients as $recipeIngredient)
            <tr>
                <td>{{ $recipeIngredient->ingredient->name }}</td>
                <td>{{ $recipeIngredient->quantity }}</td>
                <td>
                <a href="{{ route('recipeIngredients.edit', $recipeIngredient) }}" class="btn btn-warning float-end">Editare</a>
                    <form action="{{route('recipeIngredients.destroy', $recipeIngredient)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-end">Eliminare</button>
                    </form>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection


