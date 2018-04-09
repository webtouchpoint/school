<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Models\Settings\Subject;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolClass;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('settings.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.subjects.create', [
            'subject' => new Subject,
            'schoolClasses' => SchoolClass::select('id', 'name')->get()
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

        Subject::create($validatedData);

        flash('Subject has been saved!');

        return redirect(route('subjects.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
       return view('settings.subjects.edit', [
            'subject' => $subject,
            'schoolClasses' => SchoolClass::select('id', 'name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $validatedData = $this->validateData($request);

        $subject->update($validatedData);

        flash('Subject has been updated!');

        return redirect(route('subjects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        flash('"'.$subject->name.'" subject of class "'.$subject->schoolClass->name.'" has been deleted!');
        $subject->delete();
        return back();
    }

    protected function validateData($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'school_class_id' => 'required',
            'subject_group_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'description' => 'nullable'
        ]);
    }
}
