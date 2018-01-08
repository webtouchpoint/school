<?php

namespace App\Models\Settings;

use App\Model\Model;

class SchoolClass extends Model
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

    public function sections()
    {
        return $this->hasMany(Section::class, 'school_class_id');
    }

    public function subjectGroups()
    {
        return $this->hasMany(SubjectGroup::class, 'school_class_id');
    }

    public function feesCategories()
    {
        return $this->hasMany(FeesCategory::class, 'school_class_id');
    }

    public function feesStructures()
    {
        return $this->hasMany(FeesStructure::class, 'school_class_id');
    }
}
