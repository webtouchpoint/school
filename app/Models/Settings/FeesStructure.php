<?php

namespace App\Models\Settings;

use App\Model\Model;

class FeesStructure extends Model
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

    public function feesCategory()
    {
        return $this->belongsTo(FeesCategory::class, 'fees_category_id');
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }
}
