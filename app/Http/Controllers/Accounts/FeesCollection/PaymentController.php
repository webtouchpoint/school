<?php

namespace App\Http\Controllers\Accounts\FeesCollection;

use Illuminate\Http\Request;
use App\Services\Accounts\Payment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolClass;
use App\Models\Accounts\AccountsHead;
use App\Models\Settings\SchoolSession;

class PaymentController extends Controller
{
    public function showFeesPaymentForm()
    {
        return view('accounts.fees_collection.payment', [
            'schoolSessions' => SchoolSession::select(['id', 'session', 'is_current'])->get(),
            'schoolClasses' => SchoolClass::select('id', 'name')->get(),
            'accountsHeads' => AccountsHead::select('id', 'accounts_head')->get()
        ]);
    }

    public function payment(Request $request, Payment $payment)
    {
        $this->validate($request, [
            'accounts_head_id' => 'required'
        ]);
        
        DB::transaction(function () use($request, $payment) {
            $payment->pay($request);
        });

        return redirect()
            ->route('fees-receipts.index', $request->academicInfo_id);
    }
}
