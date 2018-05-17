<?php

namespace Tests\SMST\Settings\Fixtures\Settings;

use SMST\Settings\Setting;

class ExampleWithDefaultValue extends Setting
{
    const DEFAULT_VALUE = 'example_default';

    public function defaultValue()
    {
        return self::DEFAULT_VALUE;
    }
}
