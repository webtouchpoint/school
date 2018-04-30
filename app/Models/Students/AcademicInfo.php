<?php

namespace App\Models\Students;

use App\Models\Model;
use App\Models\Settings\SchoolClass;
use App\Models\Settings\FeesStructure;
use App\Models\Settings\SchoolSession;

class AcademicInfo extends Model
{
	public function student()
	{
		return $this->belongsTo(Student::class, 'student_id');
	}

	public function schoolClass()
	{
		return $this->belongsTo(SchoolClass::class);
	}

    public function feesStructures()
    {
        return $this->belongsToMany(FeesStructure::class, 'fee_student', 'academic_info_id', 'fees_structure_id')
            ->withPivot('effective_from', 'amount', 'discount', 'paid');
    }

	 /**
     * Scope a query to only include current sesssion's student.
     *
     */
    public function scopeIsCurrentSchoolSession($query)
    {
    	$school_session_id = SchoolSession::where('is_current', 0)
    		->value('id');
        return $query->where('school_session_id', $school_session_id);
    }
}
