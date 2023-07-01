<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScreenRequest;
use App\Http\Requests\UpdateScreenRequest;
use App\Models\Screen;
use App\Models\ClassModel;
use App\Models\Session;

class ScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $screens = Screen::all();
        $classModels = ClassModel::all();

        return view('admin.screen.index', compact('screens', 'classModels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classModels = ClassModel::all();
        return view('admin.screen.create', compact('classModels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScreenRequest $request)
    {

        // dd($request);
        $data = [
            'name' => $request->name,
            'classModel_id' => $request->class,
            'capacity' => $request->capacity,
        ];

        Screen::create($data);

        return redirect()->route('screen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Screen $screen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Screen $screen)
    {
        $screen = Screen::find($screen->id);
        $classModels = ClassModel::all();

        return view('admin.screen.edit', compact('screen', 'classModels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScreenRequest $request, Screen $screen)
    {
        $data = [
            'name' => $request->name,
            'classModel_id' => $request->class,
            'capacity' => $request->capacity,
        ];

        $screen = Screen::find($screen->id);
        $screen->update($data);

        return redirect()->route('screen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Screen $screen)
    {
        $screen = Screen::find($screen->id);

        if (Session::where('screen_id','=',$screen->id)->count()) {

        } else {
            $screen->delete();   
        }

        return redirect()->route('screen.index');
    }
}
