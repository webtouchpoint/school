<?php

namespace App\Http\Controllers\ExamReport;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExamReport\Examination;
use App\Models\Settings\SchoolSession;

class ExaminationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examinations = Examination::orderBy('created_at', 'desc')
            ->get();
        
        return view('exam_report.examinations.index', compact('examinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exam_report.examinations.create', [
            'examination' => new Examination,
            'schoolSessions' => SchoolSession::select('id', 'session')->get()
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

        Examination::create($validatedData);

        flash('Examination has been saved!');

        return redirect()
            ->route('examinations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamReport\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function show(Examination $examination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamReport\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function edit(Examination $examination)
    {
        return view('exam_report.examinations.edit', [
            'examination' => $examination,
            'schoolSessions' => SchoolSession::select('id', 'session')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamReport\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examination $examination)
    {
        $validatedData = $this->validateData($request);

       $examination->update($validatedData);

        flash('Examination has been updated!');

        return redirect()
            ->route('examinations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamReport\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examination $examination)
    {
       $examination->delete();

        flash('Examination has been deleted!');

        return back();
    }

    protected function validateData($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'school_session_id' => 'required',
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);
    }
}
