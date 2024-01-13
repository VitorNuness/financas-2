<?php

namespace App\Enums;

enum AccountTypes: string
{
    Case current = "Conta Corrente";
    Case savings = "Conta Poupança";
    Case credit = "Conta de Crédito";
    Case outhers = "Outros";

    public static function fromValueToValue(string $value): string
    {
        foreach (self::cases() as $type) {
            if ($value === $type->name) {
                return $type->value;
            }
        }

        throw new \ValueError("$value is not valid.");
    }

    public static function fomValueToName(string $value): self
    {
        foreach (self::cases() as $type) {
            if ($value === $type->name) {
                return $type;
            }
        }

        throw new \ValueError("$value is not valid.");
    }
}