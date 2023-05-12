@extends('layouts.app')

@section('content')

<div class="container text-center">
    <form action="{{ route('ingredients.update', $ingredient) }}" method="POST">     
        @method('PUT') 
        @csrf     	
        <label for="name" class="mb-1">Ingrediente</label>
        <input class="form-control mb-2" type="text" name="name" value="{{ $ingredient->name }}">             
        <button type="submit" class="btn btn-warning">Cambia</button>    
    </form> 
</div>
@endsection

