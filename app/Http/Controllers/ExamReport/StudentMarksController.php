<?php

namespace App\Http\Controllers\ExamReport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolClass;
use App\Models\ExamReport\Examination;
use App\Models\ExamReport\StudentMarks;

class StudentMarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allMarks = StudentMarks::orderBy('created_at', 'desc')
            ->get();
        
        return view('exam_report.student_marks.index', compact('allMarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exam_report.student_marks.create', [
            'studentMarks' => new StudentMarks,
            'examinations' => Examination::select('id', 'name')->get(),
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
        DB::transaction(function () use ($request) {
            $this->validate($request, [
                'examination_id' => 'required',
                'school_class_id' => 'required',
                'academicInfo_id' => 'required'
            ]);

            if ($request->has('subjects')) {
                $subjects = $request->subjects;  
            }

            foreach ($subjects as $key => $value) {
                if ($value > 0)
                {
                    $newMarks = new StudentMarks;
                    $newMarks->user_id = $request->user_id;
                    $newMarks->examination_id = $request->examination_id;
                    $newMarks->school_class_id = $request->school_class_id;
                    $newMarks->academic_info_id = $request->academicInfo_id;
                    $newMarks->subject_id = $key;
                    $newMarks->marks = $value;
                    $newMarks->save();
                }
            }
        });

        flash('Student Marks has been saved!');
        
        return redirect()
            ->route('student-marks.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamReport\StudentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function show(StudentMarks $studentMark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamReport\StudentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentMarks $studentMark)
    {
        return view('exam_report.student_marks.edit', [
            'marks' => $studentMark,
            'examinations' => Examination::select('id', 'name')->get(),
            'schoolClasses' => SchoolClass::select('id', 'name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamReport\StudentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentMarks $studentMark)
    {
        DB::transaction(function () use ($request, $studentMark) {
            $this->validate($request, [
                'marks' => 'required'
            ]);

            $studentMark->marks = $request->marks;
            $studentMark->save();
        });

        flash('Marks has been updated!');
        
        return redirect()
            ->route('student-marks.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamReport\StudentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentMarks $studentMark)
    {
        //
    }
}
