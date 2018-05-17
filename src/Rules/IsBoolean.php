<?php

namespace SMST\Settings\Rules;

use Respect\Validation\Validator;
use SMST\Settings\Exceptions\SettingValidationException;

class IsBoolean
{
    const ERROR_MESSAGE = 'Boolean required, value type provided: ';

    /**
     * @param $value
     * @return bool
     */
    public static function isValid($value): bool
    {
        return Validator::boolType()->validate($value);
    }

    /**
     * @param $value
     * @throws SettingValidationException
     */
    public static function reportError($value)
    {
        throw new SettingValidationException(self::ERROR_MESSAGE . gettype($value));
    }
}
