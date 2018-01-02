<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolClass;
use App\Models\Settings\SubjectGroup;

class SubjectGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.subject_groups.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.subject_groups.create', [
            'subjectGroup' => new SubjectGroup,
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

        SubjectGroup::create($validatedData);

        flash('Subject Group has been saved!');

        return redirect(route('subject-groups.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings\SubjectGroup  $subjectGroup
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectGroup $subjectGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings\SubjectGroup  $subjectGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectGroup $subjectGroup)
    {
        return view('settings.subject_groups.edit', [
            'subjectGroup' => $subjectGroup,
             'schoolClasses' => SchoolClass::select('id', 'name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings\SubjectGroup  $subjectGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubjectGroup $subjectGroup)
    {
       $validatedData = $this->validateData($request);

        $subjectGroup->update($validatedData);

        flash('Subject Group has been updated!');

        return redirect(route('subject-groups.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings\SubjectGroup  $subjectGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectGroup $subjectGroup)
    {
        //
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
