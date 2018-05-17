<?php

namespace SMST\Settings\Rules;

use SMST\Settings\Exceptions\SettingValidationException;
use Respect\Validation\Validator;

class IsNumeric extends Rule
{
    const ERROR_MESSAGE = 'Integer required, value type provided: ';

    /**
     * @param $value
     * @return bool
     */
    public static function isValid($value): bool
    {
        return Validator::numeric()->validate($value);
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
