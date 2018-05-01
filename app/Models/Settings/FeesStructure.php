<?php

namespace App\Models\Settings;

use Carbon\Carbon;
use App\Models\Model;
use App\Models\Students\AcademicInfo;
use App\Models\Accounts\FeesCollection\Transaction;

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

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'fees_structure_id');
    }

    public function feesCategory()
    {
        return $this->belongsTo(FeesCategory::class, 'fees_category_id');
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }

    public function schoolSession()
    {
        return $this->belongsTo(SchoolSession::class, 'school_session_id');
    }

    public function academicInfos()
    {
        return $this->belongsToMany(AcademicInfo::class, 'fee_student', 'fees_structure_id', 'academic_info_id')
            ->withPivot('effective_from', 'amount', 'discount', 'paid');
    }
}
