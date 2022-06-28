@extends('layout')

@section('content')
<h1 class="pageTitle">Liste des films</h1>
<a href="{{url('/films/search')}}">Recherche</a>
<div class="filmList">
            @foreach ($films as $film)
            <div class="filmCard" onclick="document.location.href='/films/'+{{$film->id}}+'/show'">
                <div class="filmTitle">{{$film->title}}</div>
                <span class="filmDate">({{$film->release_date}})</span>&nbsp;<span class="filmGenre">{{$film->genre}}</span>
            </div>
            @endforeach
</div>
@endsection