<?php

namespace App\Models\ExamReport;

use App\Models\Model;
use App\Models\Settings\Subject;
use App\Models\Settings\SchoolClass;
use App\Models\Students\AcademicInfo;
use App\Models\ExamReport\Examination;

class StudentMarks extends Model
{
    public function academicInfo()
    {
        return $this->belongsTo(AcademicInfo::class, 'academic_info_id');
    }

     public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function examination()
    {
        return $this->belongsTo(Examination::class, 'examination_id');
    }  
}
