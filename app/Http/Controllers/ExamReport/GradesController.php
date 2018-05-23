<?php

namespace App\Http\Controllers\ExamReport;

use App\Models\ExamReport\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::orderBy('created_at', 'desc')
            ->get();

        return view('exam_report.grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exam_report.grades.create', [
            'grade' => new Grade
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

        Grade::create($validatedData);

        flash('Grading Level has been saved!');

        return redirect()
            ->route('grades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamReport\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamReport\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        return view('exam_report.grades.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamReport\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $validatedData = $this->validateData($request);

        $grade->update($validatedData);

        flash('Grade level has been updated!');

        return redirect()
            ->route('grades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamReport\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        flash('Grading level has been deleted!');
        $grade->delete();
        return back();
    }

    protected function validateData($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'letter_grade' => 'required',
            'marks_from' => 'required|numeric',
            'marks_to' => 'required|numeric',
            'performance' => 'required'
        ]);
    }
}
