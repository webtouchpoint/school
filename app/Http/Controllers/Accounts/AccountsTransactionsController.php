<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accounts\AccountsHead;
use App\Models\Accounts\AccountsTransaction;

class AccountsTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountsTransactions = AccountsTransaction::orderBy('created_at', 'desc')
            ->get();
        return view('accounts.accounts_transactions.index', compact('accountsTransactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.accounts_transactions.create', [
            'accountsTransaction' =>  new AccountsTransaction,
            'accountsHeads' => AccountsHead::select('id', 'accounts_head')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        AccountsTransaction::create($validatedData);

        flash('Record has been saved!');

        return redirect()
            ->route('accounts-transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AccountsTransaction $accountsTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountsTransaction $accountsTransaction)
    {
        return view('accounts.accounts_transactions.edit', [
            'accountsTransaction' =>  $accountsTransaction,
            'accountsHeads' => AccountsHead::select('id', 'accounts_head')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountsTransaction $accountsTransaction)
    {
        $validatedData = $this->validateData($request);

        $accountsTransaction->update($validatedData);

        flash('Record has been updated!');

        return redirect()
            ->route('accounts-transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountsTransaction $accountsTransaction)
    {
        flash('"'.$accountsTransaction->purpose.'" record has been deleted!');
        $accountsTransaction->delete();
        return back();
    }

    protected function validateData($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'accounts_head_id' => 'required',
            'purpose' => 'required',
            'amount' => 'required|numeric',
            'mode' => 'required'
        ]);
    }
}
