<?php

namespace Tests\SMST\Settings\Fixtures\Settings;

use SMST\Settings\Setting;
use Tests\SMST\Settings\Fixtures\Rules\FailsWithoutErrorReporting;

class ExampleFailsWithoutErrorReporting extends Setting
{
    protected $rules = [
        FailsWithoutErrorReporting::class
    ];
}
