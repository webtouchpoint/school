<?php

namespace App\Models\Settings;

use Carbon\Carbon;
use App\Model\Model;

class School extends Model
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
        'date_of_establishment'
    ];


    public function setDateOfEstablishmentAttribute($value)
    {
        $this->attributes['date_of_establishment'] = Carbon::createFromFormat('d-m-Y', $value);
    }

}
