<?php

namespace App\Http\Controllers\Settings;

use App\Models\Settings\SchoolClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolClasses =  SchoolClass::orderBy('created_at', 'desc')
            ->get();

        return view('settings.school_classes.index', compact('schoolClasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.school_classes.create', [
            'schoolClass' => new SchoolClass
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        SchoolClass::create($validatedData);

        flash('Class has been saved!');

        return redirect(route('school-classes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolClass $schoolClass)
    {
        return view('settings.school_classes.edit', compact('schoolClass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolClass $schoolClass)
    {
        $validatedData = $this->validateData($request);

        $schoolClass->update($validatedData);

        flash('Class has been updated!');

        return redirect(route('school-classes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolClass $schoolClass)
    {
        flash('Class "'.$schoolClass->name.'" has been deleted!');
        $schoolClass->delete();
        return back();
    }

    protected function validateData($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'numeric' => 'required|numeric',
            'description' => 'nullable'
        ]);
    }
}
