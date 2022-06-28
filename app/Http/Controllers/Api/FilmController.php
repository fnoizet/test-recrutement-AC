<?php

namespace App\Http\Controllers\Api;

//use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Http\Resources\FilmResource;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all()->toArray();
        return FilmResource::collection($films);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Film::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  String  $search
     * @return \Illuminate\Http\Response
     */
    public function show(String $search)
    {
        $filterSearch = $search;
        $films = Film::where('title', 'like', "%$search%")->orWhere('release_date', 'like', "%$search%")->get();
        return FilmResource::collection($films);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $film->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();
    }
}
