<?php

namespace SMST\Settings\Rules;

use SMST\Settings\Exceptions\SettingValidationException;

abstract class Rule
{
    abstract public static function isValid($value);
    public static function reportError($value)
    {
        throw new SettingValidationException('Validation failed for value of type: ' . gettype($value) . ' using rule: ' . static::class);
    }
}
