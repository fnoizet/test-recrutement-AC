@extends('layout')

@section('content')
<h1 class="pageTitle">Fiche film</h1>
<a href="{{url('/films')}}">&lt; Tous les films</a>
<a href="{{url('/films/search')}}">&lt; Recherche</a>
<div class="filmPage">
    <div class="filmTitle">{{$film->title}}</div>
    <div class="filmInfos">
        <span class="filmDate">({{$film->release_date}})</span>&nbsp;<span class="filmGenre">{{$film->genre}}</span>
    </div>
    <div id="moviePoster"></div>
</div>

@push('head')
<script>
    const fetchMoviePoster = (str) => {
        fetch('https://api.themoviedb.org/3/search/movie?api_key=15d2ea6d0dc1d476efbca3eba2b9bbfb&query='+str)
        .then((res) => {return res.json()})
        .then((data) => {
            if (data.results.length) {
                const posterNode = document.querySelector('#moviePoster');
                let url = 'http://image.tmdb.org/t/p/w500/' + data.results[0].poster_path;
                posterNode.style.backgroundImage = 'url("'+url+'")';
            }
        })
        .catch((err) => {
            console.error(err);
        })
    };

    window.addEventListener('load', () => {
        fetchMoviePoster('{{$film->title}}');
    });
</script>
@endpush

@endsection