@extends('layouts.app')

@section('content')
<div>
    <create-recipe auth-user-id="{{ Auth::user()->id }}" @create-recipe="getRecipes"></create-recipe>
</div>
@endsection
