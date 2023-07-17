<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Movie;
use App\Models\ClassModel;
use App\Models\Screen;
use App\Models\Time;

class WebsessionController extends Controller
{
    public function index()
    {
        $live_sessions = Session::where('is_live','=','Yes')->orderBy('time_id','asc')->orderBy('date','asc')->get();

        $live_dates = [];
        $live_movies = [];

        $movies = Movie::all();

        foreach($live_sessions as $live_session) {

            if (in_array($live_session->date, $live_dates)) {
                
            } else {
                array_push($live_dates, $live_session->date);
            }

            $live_movie = Movie::find($live_session->movie_id)->title;
            if (in_array($live_movie, $live_movies)) {
                
            } else {
                
                array_push($live_movies, $live_movie);
            }
        }

        $class_models = ClassModel::all();

        $class_models_names = [];

        foreach ($class_models as $class_model){
            array_push($class_models_names, $class_model->name);
        }

        $show_arrays = [];
        $show_array = [];

        $screens = Screen::all();
        $times = Time::all();

        foreach ($live_sessions as $live_session){

            // dd($class_models->find($live_session->classModel_id)->id);
            // dd($class_models->find(($screens->find($live_session->screen_id)->id))->name);
            $show_array = [$live_session->date, Movie::find($live_session->movie_id)->title, ];
        }


        foreach ($live_sessions as $live_session) {
            // $output[] = [
            //     'Date' => $live_session->date,
            //     'Movie' => $live_session->movie_id
            // ];
            echo '<h2>' . $live_session->date . '</h2>';
            // echo '<h3>' . $live_session->movie_id . '</h3>';
        }




        return view ('layouts.websession', compact('live_sessions', 'live_dates', 'live_movies', 'class_models_names', 'movies', 'class_models', 'screens', 'times'));
    }






    public function display($date, Request $request)
    {
        $live_sessions = Session::where('is_live','=','Yes')->where('date','=',$date)->get();
        // 

        foreach ($live_sessions as $live_session) {
            // $output[] = [
            //     'Date' => $live_session->date,
            //     'Movie' => $live_session->movie_id
            // ];
            echo '<h2>' . $live_session->date . '</h2>';
            echo '<h3>' . $live_session->movie_id . '</h3>';
        }

        

        

        // return ($output);

        // $live_dates = array();

        // foreach($live_sessions as $live_session) {
        //     if (in_array($live_session->date, $live_dates)) {
        //         array_push($live_dates, $live_session->date);
        //     }
        // }

        // dd($live_dates);
    }
}
