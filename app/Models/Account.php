<?php

namespace App\Models;

use App\Enums\AccountTypes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bank',
        'type',
        'balance',
        'due_date',
        'user_id',
    ];

    public function type(): Attribute
    {
        return Attribute::make(
            set: fn (AccountTypes $type) => $type->name,
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
