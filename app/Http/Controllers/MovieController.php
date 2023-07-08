<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Http\Request;
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
            'writer' => $request->writer,
            'actors' => $request->actors,
            'duration' => $request->duration,
            'genre' => $request->genre,
            'imdbRating' => $request->imdbRating,
            'storyline' => $request->storyline,
            'status' => $request->status,
            'initial_screening' => $request->initial_screening,
            'trailer' => $request->trailer,
            'landscape_image' => $request->landscape_image,
            'portrait_image' => $request->portrait_image
        ];
        Movie::create($data);

        return redirect()->route('movie.index');

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
            'writer' => $request->writer,
            'actors' => $request->actors,
            'duration' => $request->duration,
            'genre' => $request->genre,
            'imdbRating' => $request->imdbRating,
            'storyline' => $request->storyline,
            'status' => $request->status,
            'initial_screening' => $request->initial_screening,
            'trailer' => $request->trailer,
            'landscape_image' => $request->landscape_image,
            'portrait_image' => $request->portrait_image
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

    public function imageUpload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072', //3MB

            
        ]);

        $file = $request->file('image');
        $path = $file->store('uploads', 'public');

        if ($path) {
            return response()->json([
                'status' => 'true',
                'image' => $path,
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Image upload failed',
            ]);
        }
    }
}
