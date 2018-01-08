<?php

namespace App\Models\Settings;

use App\Model\Model;

class FeesCategory extends Model
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

    public function feesStructures()
    {
        return $this->hasMany(FeesStructure::class, 'fees_category_id');
    }

    /**
     * Get all of the subjects for the class.
     */
    public function FeesStructuresThroughClass()
    {
        return $this->hasManyThrough(FeesStructure::class, SchoolClass::class);
    }
}
