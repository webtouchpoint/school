<?php

namespace App\Models\Accounts;

use App\Models\Model;

class AccountsHead extends Model
{
	public function accountsTransactions()
	{
		return $this->hasMany(AccountsTransaction::class, 'accounts_head_id');
	}
}
