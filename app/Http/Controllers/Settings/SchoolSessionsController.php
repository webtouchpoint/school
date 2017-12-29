<?php

namespace App\Http\Controllers\Settings;

use App\Models\Settings\SchoolSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolSessionsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SchoolSession::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.school_sessions.create', [
            'schoolSession' => new SchoolSession
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
        $validatedData = $this->validateData();

        SchoolSession::create($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Settings\SchoolSession  $schoolSession
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolSession $schoolSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Settings\SchoolSession  $schoolSession
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolSession $schoolSession)
    {
        return view('settings.school_sessions.edit', compact('schoolSession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Settings\SchoolSession  $schoolSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolSession $schoolSession)
    {
        $validatedData = $this->validateData(true);

        $schoolSession->update($validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Settings\SchoolSession  $schoolSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolSession $schoolSession)
    {
        //
    }

    protected function validateData($isUpdate = false)
    {
        return $validatedData = request()->validate([
            'user_id' => 'required',
            'session' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_current' => 'boolean'
        ]);
    }
}
