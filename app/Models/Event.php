<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Model;

class Event extends Model
{
  /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        // 'deleted_at',
        'start_date',
        'end_date'
    ];

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }
}
