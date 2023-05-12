@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('ingredients.store') }}" method="POST">
        @csrf
        <label for="name" class="mb-1">Name</label>
        <input type="text" name="name" id="name" class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
