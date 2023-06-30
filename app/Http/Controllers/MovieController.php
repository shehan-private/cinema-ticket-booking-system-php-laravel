<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();

        return view ('admin.movie.index', compact('movies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.movie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {

        // dd($request);
        $data = [
            'title' => $request->title,
            'director' => $request->director,
            'producer' => $request->producer,
            'writer' => $request->writer,
            'duration' => $request->duration,
            'genre' => $request->genre ?? 'thriller',
            'storyline' => $request->storyline,
            'image' => $request->image,
            'trailer' => $request->trailer,
            'status' => $request->status,
            'release_date' => $request->release_date
        ];
        Movie::create($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        // dd($movie);
        // $movie = Movie::find($movie->id);
        // dd($movie);
        return view('admin.movie.edit', compact('movie'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $data = [
            'title' => $request->title,
            'director' => $request->director,
            'producer' => $request->producer,
            'writer' => $request->writer,
            'duration' => $request->duration,
            'genre' => $request->genre ?? 'thriller',
            'storyline' => $request->storyline,
            'image' => $request->image,
            'trailer' => $request->trailer,
            'status' => $request->status,
            'release_date' => $request->release_date
        ];

        $movie->update($data);
        return redirect()->route('movie.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie = Movie::find($movie->id);
        $movie->delete();
        return redirect()->route('movie.index');

    }
}
