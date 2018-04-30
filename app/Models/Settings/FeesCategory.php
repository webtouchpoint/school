<?php

namespace App\Models\Settings;

use App\Models\Model;

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

    public function feesStructures()
    {
        return $this->hasMany(FeesStructure::class, 'fees_category_id');
    }
}
