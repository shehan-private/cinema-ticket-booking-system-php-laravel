<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassModelRequest;
use App\Http\Requests\UpdateClassModelRequest;
use App\Models\ClassModel;
use App\Models\Screen;
use App\Models\Category;

class ClassModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classModels = ClassModel::all();
        
        return view('admin.class.index', compact('classModels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassModelRequest $request)
    {
        $data = [
            'name' => $request->name,
        ];

        ClassModel::create($data);

        return redirect()->route('class.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassModel $classModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassModel $classModel)
    {
        $classModel = ClassModel::find($classModel->id);

        return view ('admin.class.edit', compact('classModel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassModelRequest $request, ClassModel $classModel)
    {
        $data = [
            'name' => $request->name,
        ];

        $classModel->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassModel $classModel)
    {
        $classModel = ClassModel::find($classModel->id);

        if (Screen::where('classModel_id','=',$classModel->id)->count() || Category::where('classModel_id','=',$classModel->id)->count()) {

            return redirect()->route('class.index');

        } else {

            $classModel->delete();
            return redirect()->route('class.index');
        }
        
        
    }
}
