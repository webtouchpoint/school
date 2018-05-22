<?php

namespace App\Models\Employees;

use Carbon\Carbon;
use App\Models\Model;
use App\Models\Settings\EmployeePosition;

class Employee extends Model
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
        'date_of_joining_in_service',
        'deleted_at'
    ];

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function setDateOfJoiningInServiceAttribute($value)
    {
        $this->attributes['date_of_joining_in_service'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function employeePosition()
    {
        return $this->belongsTo(EmployeePosition::class);
    }
}
