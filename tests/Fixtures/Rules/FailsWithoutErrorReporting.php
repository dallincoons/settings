<?php

namespace Tests\SMST\Settings\Fixtures\Rules;

use SMST\Settings\Rules\Rule;

class FailsWithoutErrorReporting extends Rule
{
    public static function isValid($value)
    {
        return false;
    }
}
