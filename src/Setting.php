<?php

namespace SMST\Settings;

use SMST\Settings\Exceptions\SettingValidationException;

abstract class Setting
{
    protected $value;
    protected $rules = [];

    public function __construct($value = null)
    {
        $value = $value ?? $this->defaultValue();

        $this->validate($value);

        $this->value = $value;
    }

    /**
     * @throws SettingValidationException
     * @param $value
     */
    protected function validate($value)
    {
        foreach ($this->rules as $rule) {
            if ($rule::isValid($value) === false) {
                $rule::reportError($value);
            }
        }
    }

    /**
     * @return string
     */
    public function key()
    {
        return snake_case(class_basename(static::class));
    }

    /**
     * @return string
     */
    public function value()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->validate($value);

        $this->value = $value;
    }

    public function defaultValue()
    {
        return '';
    }
}
