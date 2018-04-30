<?php

namespace App\Models\Students;

use Carbon\Carbon;
use App\Models\Model;
use App\Models\Settings\SchoolClass;

class Student extends Model
{
   /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'dob',
        'date_of_admission',
        'deleted_at'
    ];

	public function academicInfos()
	{	
		return $this->hasMany(AcademicInfo::class);
	}

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = Carbon::createFromFormat('d-m-Y', $value);
    }
}
