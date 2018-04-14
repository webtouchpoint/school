<?php

namespace App\Models\Students;

use App\Model\Model;
use App\Models\Settings\SchoolClass;
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
