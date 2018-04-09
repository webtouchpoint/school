<?php

namespace App\Models\Students;

use App\Model\Model;
use App\Models\Settings\SchoolClass;

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
}
