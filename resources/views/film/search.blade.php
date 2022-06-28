@extends('layout')

@section('content')
<h1 class="pageTitle">Rechercher un film</h1>
<a href="{{url('/films')}}">Tous les Films</a>
<form name="autoCompleteSearch" class="filmSearch" onsubmit="return false;">
    <input type="text" name="search" placeholder="Cherchez un titre ou une année" id="searchField">
</form>
<div id="result">
</div>

@push('head')
<script>
    window.addEventListener('load', () => {
        new FilmSearch();
    })
</script>
@endpush

@endsection