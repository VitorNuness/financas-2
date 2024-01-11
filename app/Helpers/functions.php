<?php

use App\Enums\AccountTypes;

if(!function_exists('getAccountType')) {
    function getAccountType(string $type): string {
        return AccountTypes::fromValue($type);
    }
}