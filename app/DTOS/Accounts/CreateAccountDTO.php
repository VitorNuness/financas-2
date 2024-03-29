<?php

namespace App\DTOS\Accounts;

use App\Enums\AccountTypes;
use App\Http\Requests\StoreUpdateAccountRequest;
use Illuminate\Support\Facades\Auth;

class CreateAccountDTO
{
    public function __construct(
        public string $name,
        public string $bank,
        public AccountTypes $type,
        public float|null $balance,
        public int|null $due_date,
        public int $user_id,
    ) {}

    public static function makeFromRequest(StoreUpdateAccountRequest $request): self
    {
        return new self(
            $request->name,
            $request->bank,
            getAccountTypeName($request->type),
            $request->balance,
            $request->due_date,
            $request->user()->id,
        );
    }
}