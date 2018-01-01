<?php

namespace App\Models\Settings;

use Carbon\Carbon;
use App\Model\Model;

class SchoolSession extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'start_date',
        'end_date'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */  
    protected $casts = [
        'is_current' => 'boolean',
    ];  


    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function sections()
    {
        return $this->hasMany(Section::class, 'school_class_id');
    }
}
