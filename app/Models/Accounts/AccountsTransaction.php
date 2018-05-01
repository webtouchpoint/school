<?php

namespace App\Models\Accounts;

use App\Models\User;
use App\Models\Model;
use App\Models\Accounts\FeesCollection\Transaction;

class AccountsTransaction extends Model
{
	public function accountsHead()
	{
		return $this->belongsTo(AccountsHead::class, 'accounts_head_id');
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class, 'accounts_transaction_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
