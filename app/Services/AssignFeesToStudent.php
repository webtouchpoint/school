<?php

namespace App\Services;

use App\Models\Students\AcademicInfo;
use App\Models\Settings\FeesStructure;

class AssignFeesToStudent
{

	public function __construct()
	{
	
	}

	protected function getFees($academicInfo)
	{
		return FeesStructure::where('school_session_id', $academicInfo->school_session_id)
			->where('school_class_id', $academicInfo->school_class_id)
			->get();

	}

	public function assign($academicInfo)
	{
		$fees = $this->getFees($academicInfo);

		foreach($fees as $fee)
		{
			$academicInfo->feesStructures()->attach($fee, ['effective_from' => now()]);
		}
	}
}