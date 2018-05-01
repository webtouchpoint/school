<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Accounts\AccountsHead;
use App\Models\Accounts\AccountsTransaction;

class BalanceSheetController extends Controller
{
    public function showBalanceSheet()
    {
	    	$incomeHeads = AccountsHead::where('category', 'income')
    		->pluck('id');

	    	$expenditureHeads = AccountsHead::where('category', 'expenditure')
    		->pluck('id');

    		$income = AccountsTransaction::whereIn('accounts_head_id', $incomeHeads)
    			->sum('amount');

    		$expenditure = AccountsTransaction::whereIn('accounts_head_id', $expenditureHeads)
    			->sum('amount');

    	return view('accounts.balanceSheet', compact('income', 'expenditure'));
    }
}
