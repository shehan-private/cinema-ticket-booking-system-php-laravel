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
        $sessions = Session::all();
        $times = Time::all();
        $screens = Screen::all();
        $movies = Movie::all();
        
        // dd($sessions);

        return view ('admin.session.index', compact('sessions','times','screens','movies'));
        
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
        // dd($request);
        $timeVal = $request->time;
        $movieVal = $request->movie;

        for ($i=0; $i < count($timeVal); $i++) {
            if ($timeVal[$i] != 'Select Time' && $movieVal[$i] != 'Select Time') {
                $data = [
                    'date' => strtotime($request->date),
                    'screen_id' => (int)($request->screen),
                    'time_id' => (int)($timeVal[$i]),
                    'movie_id' => (int)($movieVal[$i]),
                    'status' => 'Scheduled',
                ];
                // dd($data);
                Session::create($data);
            }
        }

        return redirect()->route('session.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        //
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
