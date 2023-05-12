@extends('layouts.app') 
@section('content')
<table class="table car">
    <thead>
        <th>Name</th>
    </thead>
    <tbody>
        <tr>
            @foreach($ingredients as $ing)
            <td>{{ $ing->name }}</td>
            @endforeach
        </tr>
    </tbody>
</table> 
@endsection