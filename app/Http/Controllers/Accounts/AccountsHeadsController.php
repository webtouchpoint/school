<?php

namespace App\Http\Controllers\Accounts;

use App\Models\Accounts\AccountsHead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountsHeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountsHeads = AccountsHead::orderBy('created_at', 'desc')
            ->get();

        return view('accounts.accounts_heads.index', compact('accountsHeads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.accounts_heads.create', [
            'accountsHead' => new AccountsHead
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

        AccountsHead::create($validatedData);

        flash('Accounts Head has been saved!');

        return redirect()
            ->route('accounts-heads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accounts\AccountsHead  $accountsHead
     * @return \Illuminate\Http\Response
     */
    public function show(AccountsHead $accountsHead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accounts\AccountsHead  $accountsHead
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountsHead $accountsHead)
    {
        return view('accounts.accounts_heads.edit', compact('accountsHead'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accounts\AccountsHead  $accountsHead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountsHead $accountsHead)
    {
        $validatedData = $this->validateData($request);

        $accountsHead->update($validatedData);

        flash('Accounts Head has been updated!');

        return redirect()
            ->route('accounts-heads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accounts\AccountsHead  $accountsHead
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountsHead $accountsHead)
    {
        flash('"'.$accountsHead->accounts_head.'" accounts heads has been deleted!');
        $accountsHead->delete();
        return back();
    }

    protected function validateData($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'category' => 'required',
            'accounts_head' => 'required',
            'is_active' => 'required'
        ]);
    }
}
