<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Models\Settings\School;
use App\Http\Controllers\Controller;
use App\Models\Students\AcademicInfo;
use App\Models\Accounts\AccountsTransaction;
use App\Models\Accounts\FeesCollection\Transaction;

class FeesReceiptsController extends Controller
{
    public function index($academic_info_id)
    {
    	$transactions = Transaction::where('academic_info_id', $academic_info_id)
    		->orderBy('created_at', 'desc')
    		->get();

    	return view('accounts.fees_receipts.index', compact('transactions'));
    }

    public function print($accounts_transaction_id, $academic_info_id)
    {
        $school = School::first();

        $accountsTransaction = AccountsTransaction::find($accounts_transaction_id);

        $transactions = Transaction::where('accounts_transaction_id', $accounts_transaction_id)
            ->get();

        $academicInfo = AcademicInfo::find($academic_info_id);

    	return view('accounts.fees_receipts.print', compact('school', 'accountsTransaction', 'transactions', 'academicInfo'));
    }
}
