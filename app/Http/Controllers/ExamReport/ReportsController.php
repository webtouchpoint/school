<?php

namespace App\Http\Controllers\ExamReport;

use Illuminate\Http\Request;
use App\Models\Settings\School;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolClass;
use App\Models\Students\AcademicInfo;
use App\Models\Settings\SchoolSession;
use App\Models\ExamReport\StudentMarks;

class ReportsController extends Controller
{
   	public function showGenerateReportForm()
   	{
        return view('exam_report.reports.generateReportForm', [
            'schoolSessions' => SchoolSession::select(['id', 'session', 'is_current'])->get(),
            'schoolClasses' => SchoolClass::select('id', 'name')->get()
        ]);
   	}

   	public function generateReport(Request $request)
   	{
        $school = School::first();

        $academicInfo = AcademicInfo::find($request->academicInfo_id);

		$studentMarks = StudentMarks::where('academic_info_id', $request->academicInfo_id)
			->get();

		return view('exam_report.reports.examReport', compact('school','studentMarks', 'academicInfo'));
   	}
}
