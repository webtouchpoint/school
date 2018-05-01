<?php

namespace App\Services\Accounts;

use Illuminate\Support\Facades\DB;
use App\Models\Students\AcademicInfo;
use App\Models\Settings\FeesStructure;
use App\Models\Accounts\AccountsTransaction;
use App\Models\Accounts\FeesCollection\Transaction;

class Payment
{
	public function pay($request)
	{
		$accounts_transaction_id = $this->saveAccountsTransaction($request);

		foreach ($request->fees_structures as $fees_structure_id) {
			DB::table('fee_student')
				->where('academic_info_id', $request->academicInfo_id)
				->where('fees_structure_id', $fees_structure_id)
				->update(['paid' => 1]);

			$this->saveTransaction($request, $fees_structure_id, $accounts_transaction_id);
		}
	}

	protected function saveAccountsTransaction($request)
	{
			$accountsTransaction = new AccountsTransaction;
			$accountsTransaction->user_id = $request->user_id;
			$accountsTransaction->accounts_head_id = $request->accounts_head_id;
			$accountsTransaction->amount = $request->amount;
			$accountsTransaction->mode = $request->mode;
			$accountsTransaction->remarks = $request->remarks;
			$accountsTransaction->save();

			return $accountsTransaction->id;
	}

	protected function saveTransaction($request, $fees_structure_id, $accounts_transaction_id)
	{
			$feesStructure = FeesStructure::findOrFail($fees_structure_id);

			$transaction = new Transaction;
			$transaction->user_id = $request->user_id;
			$transaction->fees_structure_id = $fees_structure_id;
			$transaction->academic_info_id = $request->academicInfo_id;
			$transaction->accounts_transaction_id = $accounts_transaction_id;
			$transaction->amount = $feesStructure->amount;
			$transaction->save();
	}
}