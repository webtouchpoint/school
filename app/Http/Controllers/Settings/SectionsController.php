<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Models\Settings\Section;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolClass;
use App\Http\Resources\Settings\SectionResource;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sections = Section::with('schoolClass')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('settings.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.sections.create', [
            'section' => new Section,
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

        Section::create($validatedData);

        flash('Section has been saved!');

        return redirect(route('sections.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('settings.sections.edit', [
            'section' => $section,
            'schoolClasses' => SchoolClass::select('id', 'name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $validatedData = $this->validateData($request);

        $section->update($validatedData);

        flash('Section has been updated!');

        return redirect(route('sections.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        flash('"'.$section->name.'" section of class "'.$section->schoolClass->name.'" has been deleted!');
        $section->delete();
        return back();
    }

    public function fetchBySchoolClassId($school_class_id)
    {
        $sections = Section::select('id', 'name')
                            ->where('school_class_id', $school_class_id)
                            ->get();

        return $sections;
    }

    protected function validateData($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'school_class_id' => 'required',
            'name' => 'required',
            'description' => 'nullable'
        ]);
    }
}
