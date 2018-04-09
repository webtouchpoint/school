<?php

namespace App\Traits\Settings;

trait SchoolClassRelation 
{
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

    public function academicInfos()
    {
        return $this->hasMany(AcademicInfo::class, 'school_class_id');
    }
}