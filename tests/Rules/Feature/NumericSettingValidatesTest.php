<?php

namespace Tests\SMST\Settings\Rules\Feature;

use SMST\Settings\Exceptions\SettingValidationException;
use Tests\SMST\Settings\Fixtures\Settings\ExampleNumericSetting;
use Tests\SMST\Settings\TestCase;

/**
 * @group feature-tests
 * @group setting-tests
 * @group numeric-setting-tests
 */
class NumericSettingValidatesTest extends TestCase
{
    /** @test */
    public function it_requires_setting_value_to_be_numeric_on_instantiation()
    {
        $this->assertExceptionInstanceOf(function () {
            new ExampleNumericSetting('non numeric');
        }, SettingValidationException::class);
    }

    /** @test */
    public function it_requires_setting_value_to_be_numeric_on_update()
    {
        $this->assertExceptionInstanceOf(function () {
            (new ExampleNumericSetting(1))->setValue('non numeric');
        }, SettingValidationException::class);
    }

    /** @test */
    public function it_allows_numeric_value()
    {
        $setting = new ExampleNumericSetting(123);

        $this->assertEquals(123, $setting->value());
    }
}
