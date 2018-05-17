<?php

namespace SMST\Settings\Rules;

use Respect\Validation\Validator;
use SMST\Settings\Exceptions\SettingValidationException;

class Required extends Rule
{
    const ERROR_MESSAGE = 'Non-empty value is required';

    /**
     * @param $value
     * @return bool
     */
    public static function isValid($value): bool
    {
        return Validator::notEmpty()->validate($value);
    }

    /**
     * @param $value
     * @throws SettingValidationException
     */
    public static function reportError($value)
    {
        throw new SettingValidationException(self::ERROR_MESSAGE);
    }
}
