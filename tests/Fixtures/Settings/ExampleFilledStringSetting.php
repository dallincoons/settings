<?php

namespace Tests\SMST\Settings\Fixtures\Settings;

use SMST\Settings\Rules\IsString;
use SMST\Settings\Rules\Required;
use SMST\Settings\Setting;

class ExampleFilledStringSetting extends Setting
{
    protected $rules = [
        IsString::class,
        Required::class
    ];
}
