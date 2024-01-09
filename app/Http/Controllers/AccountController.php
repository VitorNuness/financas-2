<?php

namespace App\Http\Controllers;

use App\DTOS\CreateAccountDTO;
use App\DTOS\UpdateAccountDTO;
use App\Http\Requests\StoreUpdateAccountRequest;
use App\Models\Account;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct(
        protected AccountService $service
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $accounts = $this->service->getAll($request->filter);

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
        $this->service->new(CreateAccountDTO::makeFromRequest($request));

        return redirect()->route('accounts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$account = $this->service->findOne($id)) {
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
        if (!$account = $this->service->findOne($id)) {
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
    public function update(StoreUpdateAccountRequest $request)
    {
        $account = $this->service->update(UpdateAccountDTO::makeFromRequest($request));

        if (!$account) {
            return back();
        }

        return view('accounts/show', compact('account'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('accounts.index');
    }
}
