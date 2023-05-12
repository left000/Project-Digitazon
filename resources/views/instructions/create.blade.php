@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('instructions.store') }}" method="POST">
        @csrf
        <label for="recipe_id" class="mb-1">Ricetta</label>
        <input type="hidden" name="recipe_id" id="recipe_id" value="{{ $id }}"  class="form-control mb-2">
        <label for="step_number" class="mb-1">Passi</label>
        <input type="text" name="step_number" id="step_number" class="form-control mb-2">
        <label for="description" class="mb-1">Descrizione</label>
        <input type="text" name="description" id="description" class="form-control mb-2">
        <button type="submit" class="btn btn-success">Crea</button>
    </form>
</div>
@endsection
