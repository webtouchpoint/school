<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Models\Students\Student;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolClass;
use App\Models\Students\AcademicInfo;
use App\Models\Settings\SchoolSession;
use App\Http\Requests\Students\AdmissionFormRequest;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $academicInfos = AcademicInfo::all();

        return view('students.index', compact('academicInfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create', [
            'schoolSessions' => SchoolSession::select('id', 'session')->get(),
            'schoolClasses' => SchoolClass::select('id', 'name')->get(),
            'academicInfo' => null,
            'student' => new Student
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdmissionFormRequest $request)
    {
        DB::transaction(function () use ($request) {
            $request->merge(['date_of_admission' => date('Y-m-d')]);

            $studentData =  collect($request->all());
            $studentData = $studentData->except(['school_session_id', 'school_class_id', 'section_id', 'roll_number'])
                ->toArray();

            $student = Student::create($studentData);

            $academicInfo =  new AcademicInfo([
                'school_session_id' => $request->school_session_id,
                'school_class_id' => $request->school_class_id,
                'section_id' => $request->section_id,
                'roll_number' => $request->roll_number
            ]);

            if ($student) {
                $student->academicInfos()->save($academicInfo);
            }
        });

        flash('Student details has been saved!');
        
        return redirect()
            ->route('students.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $academicInfo = $student->academicInfos()->where('school_session_id', 2)->first();
        return view('students.edit', [
            'schoolSessions' => SchoolSession::select('id', 'session')->get(),
            'schoolClasses' => SchoolClass::select('id', 'name')->get(),
            'academicInfo' => $academicInfo,
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(AdmissionFormRequest $request, Student $student)
    {
        DB::transaction(function () use ($student, $request) {
            $studentData = collect($request->all());
            $studentData = $studentData->except(['school_session_id', 'school_class_id', 'section_id', 'roll_number'])
                ->toArray();

            $student->update($studentData);

            if ($academicInfo = $student->academicInfos()->where('school_session_id', 2)->first()) {
                $academicInfo->school_session_id = $request->school_session_id;
                $academicInfo->school_class_id = $request->school_class_id;
                $academicInfo->section_id = $request->section_id;
                $academicInfo->roll_number = $request->roll_number;

                $academicInfo->save();
            }
        });

        flash('Student details has been updated!');
        
        return redirect()
            ->route('students.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        flash('"'.$student->name.'" student has been deleted!');
        $student->delete();
        return back();
    }
}
