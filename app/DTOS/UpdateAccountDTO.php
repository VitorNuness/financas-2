<?php

namespace App\DTOS;

use App\Http\Requests\StoreUpdateAccountRequest;

class UpdateAccountDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $bank,
        public string $type,
        public float|null $balance,
        public int|null $due_date,
    ) {}

    public static function makeFromRequest(StoreUpdateAccountRequest $request): self
    {
        return new self(
            $request->id,
            $request->name,
            $request->bank,
            $request->type,
            $request->balance,
            $request->due_date,
        );
    }
}