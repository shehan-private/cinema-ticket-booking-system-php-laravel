<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Models\Session;
use App\Models\Time;
use App\Models\Screen;
use App\Models\Movie;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $sessions_today = Session::where('date','=',date('Y-m-d', time()))->orderBy('date','asc')->get();
        $sessions_schedule = Session::where('status','=','Scheduled')->orderBy('date','asc')->get();
        $sessions_complete = Session::where('status','=','Completed')->orderBy('date','asc')->get();
        $sessions = Session::orderBy('date', 'asc')->get();
        $times = Time::all();
        $screens = Screen::all();
        $movies = Movie::all();

        $session_dates = array();
        $session_temp = array(
            'date' => '',
            'status' => '',
            'attend_full' => 0,
            'attend_half' => 0,
            'income' => 0,
            'is_live' => 'No'
        );

        // dd($session_array['date']);
        
        foreach ($sessions as $session) {

            $session_array = array(
                'date' => $session->date,
                'status' => $session->status,
                'attend_full' => $session->attend_full,
                'attend_half' => $session->attend_half,
                'income' => $session->income,
                'is_live' => $session->is_live
            );

            

            if ($session_array['date'] != $session_temp['date']) {

                
                if ($session_temp['date']!= '') {
                    array_push($session_dates, $session_temp);
                }
                
                $session_temp = $session_array;

            } else {

                $session_temp['attend_full'] += $session_array['attend_full'];
                $session_temp['attend_half'] += $session_array['attend_half'];
                $session_temp['income'] += $session_array['income'];
                
            }
            
        }

        // dd($session_dates);

        return view ('admin.session.index', compact('session_dates', 'sessions_today','sessions_schedule','sessions_complete','times','screens','movies'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sessions = Session::all();
        $times = Time::all();
        $screens = Screen::all();
        $movies = Movie::all();

        return view ('admin.session.create', compact('times','screens','movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSessionRequest $request)
    {

        $timeVal = $request->time;
        $movieVal = $request->movie;

        for ($i=0; $i < count($timeVal); $i++) {
            if ($timeVal[$i] != 'Select Time' && $movieVal[$i] != 'Select Time') {
                $data = [
                    'date' => $request->date,
                    'screen_id' => (int)($request->screen),
                    'time_id' => (int)($timeVal[$i]),
                    'movie_id' => (int)($movieVal[$i]),
                    'status' => 'Scheduled',
                    'is_live' => 'No'
                ];

                Session::create($data);
            }
        }

        return redirect()->route('session.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($date)
    {
        $sessions = Session::where('date','=',$date)->orderBy('time_id','asc')->orderBy('screen_id','asc')->get();
        $times = Time::all();
        $screens = Screen::all();
        $movies = Movie::all();
        // dd($sessions);
        return view('admin.session.show', compact('sessions', 'times', 'screens', 'movies'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        //
    }
}
