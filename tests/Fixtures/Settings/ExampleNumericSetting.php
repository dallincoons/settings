<?php

namespace Tests\SMST\Settings\Fixtures\Settings;

use SMST\Settings\Rules\IsNumeric;
use SMST\Settings\Setting;

class ExampleNumericSetting extends Setting
{
    protected $rules = [
        IsNumeric::class
    ];
}
