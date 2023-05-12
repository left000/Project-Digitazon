@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center">
        <h3>Instruzioni {{ $recipe_name }}</h3>
        <a href="{{ route('instructions.create') }}?id={{ $recipe_id }}" class="btn btn-success btn-sm">Creare</a>
    </div>
    <table class="table car">
        <thead>
            <th>Passi</th>
            <th>Descrizione</th>
        </thead>
        <tbody>@foreach($instructions as $instruction)
            <tr>
                <td>{{ $instruction->step_number }}</td>
                <td>{{ $instruction->description }}</td>
                <td>
                    <form action="{{route('instructions.destroy', $instruction)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('instructions.edit', $instruction) }}" class="btn btn-warning float-end">Editare</a>
                        <button type="submit" class="btn btn-danger float-end">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection