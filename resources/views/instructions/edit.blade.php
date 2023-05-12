@extends('layouts.app')

@section('content')

<div class="container text-center">
    <form action="{{ route('instructions.update', $instruction) }}" method="POST">     
        @method('PUT') 
        @csrf     	
        <input type="hidden" name="recipe_id" id="recipe_id" value="{{ $id }}" class="form-control mb-2">
        <label for="step_number" class="mb-1">Passi</label>
        <input class="form-control mb-2" type="text" name="step_number">     
        <label for="description" class="mb-1">Descrizione</label>
        <input class="form-control mb-2" type="text" name="description">           
        <button type="submit" class="btn btn-warning">Cambia</button>    
    </form> 
</div>
@endsection

