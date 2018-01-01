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
}
