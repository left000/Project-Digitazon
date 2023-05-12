@extends('layouts.app')

@section('content')

<div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active d-item">
                <img style="height: 50em; object-fit:cover; filter: brightness(0.3)" src="https://img.freepik.com/foto-gratis/comida-ingredientes_1220-4884.jpg" class="d-block w-100 d-img" alt="...">
            <div style="margin-top: 12em !important" class="carousel-caption top-0 mt-4">
                <p class="mt-5 fs-3 text-uppercase">Scopri tutte le ricette!</p>
                <h1 class="display-1 fw-bolder text-uppercase text-capitalize">Ricette</h1>
                <a class="btn btn-primary px-4 py-2 fs-5 mt-5" href="/recipes">Ricette</a>
            </div>
            </div>

            <div class="carousel-item active d-item">
                <img style="height: 50em; object-fit:cover; filter: brightness(0.3)" src="https://img.freepik.com/foto-gratis/comida-ingredientes_1220-4884.jpg" class="d-block w-100 d-img" alt="...">
            <div style="margin-top: 12em !important" class="carousel-caption top-0 mt-4">
                <p class="mt-5 fs-3 text-uppercase">Hai la possibilità di creare la tua ricetta!!</p>
                <h1 class="display-1 fw-bolder text-uppercase text-capitalize">Crea la ricetta</h1>
                <a class="btn btn-primary px-4 py-2 fs-5 mt-5" href="/create">CREA</a>
            </div>
            </div>

            <div class="carousel-item active d-item">
                <img style="height: 50em; object-fit:cover; filter: brightness(0.3)" src="https://img.freepik.com/foto-gratis/comida-ingredientes_1220-4884.jpg" class="d-block w-100 d-img" alt="...">
            <div style="margin-top: 12em !important" class="carousel-caption top-0 mt-4">
                <p class="mt-5 fs-3 text-uppercase">SE VUOI SAPERE CHI È LO CHEF</p>
                <h1 class="display-1 fw-bolder text-uppercase text-capitalize">CHEF</h1>
                <a class="btn btn-primary px-4 py-2 fs-5 mt-5" href="/chef">CHEF</a>
            </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    
</div>

<div class="container m-5">
    <h1 class="ricetta">Le Ricette</h1>
</div>



<board auth-user-id="{{ Auth::user()->id }}" auth-user-name="{{ Auth::user()->name }}" ></board>



@endsection
