<?php

use App\Enums\AccountTypes;

if(!function_exists('getAccountType')) {
    function getAccountType(string $type): string {
        return AccountTypes::fromValueToValue($type);
    }
}

if(!function_exists('getAccountTypeName')) {
    function getAccountTypeName(string $type): AccountTypes {
        return AccountTypes::fomValueToName($type);
    }
}