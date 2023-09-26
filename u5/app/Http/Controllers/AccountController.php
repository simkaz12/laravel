<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();

        return view('acc.index', [
            'accounts' => $accounts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('acc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $acc = new Account;
        $acc->iban = createIBAN();
        $acc->balance = 0;
        $acc->type = $request->type;
        $acc->user_id = 1;
        $acc->save();

        return redirect()
            ->route('acc-index')
            ->with('msg', ['type' => 'success', 'content' => 'New account created!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        $accounts = Account::all();

        return view('acc.show', [
            'account' => $account,
            'accounts' => $accounts
        ]);
    }

    public function delete(Account $account)
    {
        return view('acc.delete', [
            'account' => $account,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        $accounts = Account::all();
        return view('acc.edit', [
            'account' => $account,
            'accounts' => $accounts
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
    }


    public function transfer(Request $request, Account $account)
    {
        $accounts = Account::all();
        return view('acc.transfer', [
            'account' => $account,
            'accounts' => $accounts
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        if ($account->balance == 0) {
            $account->delete();

            return redirect()
                ->route('acc-index')
                ->with('msg', [
                    'type' => 'success',
                    'content' => 'Account succsessfuly deleated!'
                ]);
        } else {
            return redirect()->route('acc-delete', [
                'account' => $account
            ])->with('msg', [
                        'type' => 'danger',
                        'content' => 'Account with funds cannot be deleted.'
                    ]);
        }
    }
}