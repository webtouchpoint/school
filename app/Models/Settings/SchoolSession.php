<?php

namespace App\Models\Settings;

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
        'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */  
    protected $casts = [
        'is_current' => 'boolean',
    ];  
}
