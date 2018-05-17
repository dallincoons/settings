<?php

namespace Tests\SMST\Settings\Fixtures\Settings;

use SMST\Settings\Rules\Required;
use SMST\Settings\Setting;

class ExampleRequiredSetting extends Setting
{
    protected $rules = [
        Required::class
    ];
}
