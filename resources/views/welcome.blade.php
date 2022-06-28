@extends('layout')

@section('content')
<div class="container">
    <div>
        <a href="{{url('/films')}}">Tous les Films</a>
        <a href="{{url('/films/search')}}">Recherche</a>
    </div>
</div>
@endsection