<?php

namespace App\Models\Settings;

use App\Models\Model;

class EmployeePosition extends Model
{
    public function employees()
    {
    	return $this->hasMany(Employee::class);
    }
}
