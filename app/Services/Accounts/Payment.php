<?php

namespace App\Services\Accounts;

use Illuminate\Support\Facades\DB;
use App\Models\Students\AcademicInfo;
use App\Models\Settings\FeesStructure;
use App\Models\Accounts\FeesCollection\Transaction;

class Payment
{
	public function pay($request)
	{
		foreach ($request->fees_structures as $fees_structure_id) {
			DB::table('fee_student')
				->where('academic_info_id', $request->academicInfo_id)
				->where('fees_structure_id', $fees_structure_id)
				->update(['paid' => 1]);

			$this->saveTransaction($request, $fees_structure_id);
		}
	}

	protected function saveTransaction($request, $fees_structure_id)
	{
			$feesStructure = FeesStructure::findOrFail($fees_structure_id);

			$transaction = new Transaction;
			$transaction->user_id = $request->user_id;
			$transaction->date = now();
			$transaction->fees_structure_id = $fees_structure_id;
			$transaction->academic_info_id = $request->academicInfo_id;
			$transaction->amount = $feesStructure->amount;
			$transaction->save();
	}
}