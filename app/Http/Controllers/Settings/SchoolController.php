<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Models\Settings\School;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\CreateSchoolForm;

class SchoolController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSchoolForm $request)
    {

        $school = School::create($request->all());

        flash('School data has been saved!')->success();

        return redirect()->route('school.edit', compact('school'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $school = School::find($id);
       
        if(is_null($school))
        {
            return view('settings.school.create', [
                'school' => new School
            ]);
        }

        return view('settings.school.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $school->update($request->all());

        flash('School data has been saved!')->success();

        return back();
    }
}