<?php

namespace App\Http\Controllers\Accounts\FeesCollection;

use Illuminate\Http\Request;
use App\Services\Accounts\Payment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolClass;
use App\Models\Settings\SchoolSession;

class PaymentController extends Controller
{
    public function showFeesPaymentForm()
    {
        return view('accounts.fees_collection.payment', [
            'schoolSessions' => SchoolSession::select(['id', 'session', 'is_current'])->get(),
            'schoolClasses' => SchoolClass::select('id', 'name')->get()
        ]);
    }

    public function payment(Request $request, Payment $payment)
    {
        DB::transaction(function () use($request, $payment) {
            $payment->pay($request);
        });
    }
}
