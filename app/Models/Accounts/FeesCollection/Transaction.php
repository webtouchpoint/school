<?php

namespace App\Models\Accounts\FeesCollection;

use App\Models\Model;
use App\Models\Settings\FeesStructure;
use App\Models\Accounts\AccountsTransaction;

class Transaction extends Model
{
	public function accountsTransaction()
	{
		return $this->belongsTo(AccountsTransaction::class, 'accounts_transaction_id');
	}

	public function feesStructure()
	{
		return $this->belongsTo(FeesStructure::class, 'fees_structure_id');
	}
}
