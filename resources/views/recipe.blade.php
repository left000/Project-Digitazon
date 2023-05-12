@extends('layouts.app')

@section('content')
<div>
    <board auth-user-id="{{ Auth::user()->id }}" auth-user-name="{{ Auth::user()->name }}" ></board>
</div>
@endsection
