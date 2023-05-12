@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center">
        <h3>Ingredients List</h3>
        <a href="{{ route('ingredients.create') }}" class="btn btn-success btn-sm">Create</a>
    </div>
    <table class="table car">
        <thead>
            <th>Name</th>
        </thead>
        <tbody>@foreach($ingredients as $ingredient)
            <tr>
                <td>{{ $ingredient->name }}</td>
                <td>
                <a href="{{ route('ingredients.edit', $ingredient) }}" class="btn btn-warning float-end">Edit</a>
                    <form action="{{route('ingredients.destroy', $ingredient)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-end">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection