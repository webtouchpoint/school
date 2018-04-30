<?php

namespace App\Models\Settings;

use App\Models\Model;
use App\Traits\Settings\SchoolClassRelation;

class SchoolClass extends Model
{
    use SchoolClassRelation;

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

}
