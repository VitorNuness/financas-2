<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAccountRequest;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Account $account)
    {
        $accounts = $account->all()->where('user_id', Auth::user()->id);

        return view('accounts/index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateAccountRequest $request)
    {
        $data = $request->validated();
        $request->user()->accounts()->create($data);

        return redirect()->route('accounts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$account = Account::findOrFail($id)) {
            return back();
        }

        if ($account->user_id !== Auth::user()->id) {
            return back();
        }

        return view('accounts/show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$account = Account::findOrFail($id)) {
            return back();
        }

        if ($account->user_id !== Auth::user()->id) {
            return back();
        }

        return view('accounts/edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateAccountRequest $request, string $id)
    {
        if (!$account = Account::findOrFail($id)) {
            return back();
        }

        if ($account->user_id !== Auth::user()->id) {
            return back();
        }

        $account->update($request->validated());

        return view('accounts/show', compact('account'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$account = Account::findOrFail($id)) {
            return back();
        }

        if ($account->user_id !== Auth::user()->id) {
            return back();
        }

        $account->delete();

        return redirect()->route('accounts.index');
    }
}
