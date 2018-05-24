<?php

namespace App\Http\Controllers\ExamReport;

use Illuminate\Http\Request;
use App\Models\ExamReport\Marks;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolClass;
use App\Models\ExamReport\Examination;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allMarks = Marks::orderBy('created_at', 'desc')
            ->get();
        
        return view('exam_report.marks.index', compact('allMarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exam_report.marks.create', [
            'marks' => new Marks,
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
                'school_class_id' => 'required'
            ]);

            if ($request->has('subjects')) {
                $subjects = $request->subjects;  
            }

            foreach ($subjects as $key => $value) {
                $newMarks = new Marks;
                $newMarks->user_id = $request->user_id;
                $newMarks->examination_id = $request->examination_id;
                $newMarks->school_class_id = $request->school_class_id;
                $newMarks->subject_id = $key;
                $newMarks->marks = $value;
                $newMarks->save();
            }
        });

        flash('Marks has been saved!');
        
        return redirect()
            ->route('marks.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamReport\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function show(Marks $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamReport\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function edit(Marks $mark)
    {
        return view('exam_report.marks.edit', [
            'marks' => $mark,
            'examinations' => Examination::select('id', 'name')->get(),
            'schoolClasses' => SchoolClass::select('id', 'name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamReport\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marks $mark)
    {
        DB::transaction(function () use ($request, $mark) {
            $this->validate($request, [
                'marks' => 'required'
            ]);

            $mark->marks = $request->marks;
            $mark->save();
        });

        flash('Marks has been updated!');
        
        return redirect()
            ->route('marks.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamReport\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marks $mark)
    {
        //
    }
}
