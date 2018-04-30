<?php

namespace App\Models\Settings;

use App\Models\Model;

class SubjectGroup extends Model
{
   	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'subject_group_id');
    }

    /**
     * Get all of the subjects for the class.
     */
    public function subjectsThroughClass()
    {
        return $this->hasManyThrough(Subject::class, SchoolClass::class);
    }
}
