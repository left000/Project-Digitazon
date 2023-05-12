@extends('layouts.app')

@section('content')
<div class="card container" style="width: 20rem;">
        <div class="card-body ">
            <img class="card-img-top img-fluid"  :src="image" alt="image">
            <h3 class="card-title m-3 ">Nome: {{ $recipe->name }}</h3>
            <h3 class="card-title m-3 ">Descrizione: {{ $recipe->description }}</h3>
            <h3 class="card-title m-3 ">Porzioni: {{ $recipe->servings }}</h3>
            <h3 class="card-title m-3 "> Tempo di preparazione: {{ $recipe->prep_time }}</h3>
            <h3 class="card-title m-3 ">Tempo di cucinare: {{ $recipe->cook_time }}</h3>
            <h3 class="card-title m-3 ">Difficoltà: {{ $recipe->difficulty }}</h3>
            <h3 class="card-title m-3">Tempo Totale: {{ $recipe->total_time }}</h3>
            <h5 class="card-title m-3">Utente {{ $recipe->authUserName }}</h5>
            <button class="btn btn-primary float-end">INSTRUZIONI</button>
        </div>        
    </div>

        
@endsection