<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolSession;

class SchoolSessionsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolSessions = SchoolSession::orderBy('created_at', 'desc')
            ->get();

        return view('settings.school_sessions.index', compact('schoolSessions'));
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
        $validatedData = $this->validateData($request);

        $schoolSession = SchoolSession::create($validatedData);

        flash('Session data has been saved!');

        return redirect(route('school-sessions.index'));

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
        $validatedData = $this->validateData($request);

        $schoolSession->update($validatedData);

        flash('Session data has been updated!');

        return redirect()
            ->route('school-sessions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Settings\SchoolSession  $schoolSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolSession $schoolSession)
    {
        flash('"'.$schoolSession->session.'" session has been deleted!');
        $schoolSession->delete();
        return back();
    }

    protected function validateData($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'session' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date'
        ]);
    }

    public function showSetSessionForm()
    {
        return view('settings.school_sessions.set_session', [
            'schoolSessions' => SchoolSession::select(['id', 'session', 'is_current'])->get()
        ]);
    }

    public function setSession(Request $request)
    {
        $this->validate($request, ['session' => 'required|exists:school_sessions,id']);

        $this->setAllCurrentYearFalse();

        $schoolSession = SchoolSession::find($request->session);

        $schoolSession->is_current = true;
        $schoolSession->save();

        flash('Session has been set!');

        return redirect(route('school-sessions.index'));

    }

    protected function setAllCurrentYearFalse()
    {
        DB::table('school_sessions')
            ->update(['is_current' => false]);
    }
}
