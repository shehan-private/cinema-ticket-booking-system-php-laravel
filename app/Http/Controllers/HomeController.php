<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $moviesNowShowing = Movie::where('status','=','Now Showing')->get();
        $moviesComingSoon = Movie::where('status','=','Coming Soon')->get();
        // dd($moviesNowShowing);
        return view('layouts.web', compact('moviesNowShowing', 'moviesComingSoon'));
    }
}
