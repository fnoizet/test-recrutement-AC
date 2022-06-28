<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index() {
        $films = Film::all();
        return view('film.index', compact('films'));
    }

    public function search() {
        return view('film.search');
    }

    public function show(String $filmId) {
        $film = Film::where('id', $filmId)->first();
        if (!is_null($film)) {
            return view('film.show', compact('film'));
        } else {
            return view('film.notFound');
        }
    }
}
