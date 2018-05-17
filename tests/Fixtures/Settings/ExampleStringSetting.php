<?php

namespace Tests\SMST\Settings\Fixtures\Settings;

use SMST\Settings\Rules\IsString;
use SMST\Settings\Setting;

class ExampleStringSetting extends Setting
{
    protected $rules = [
        IsString::class
    ];
}
