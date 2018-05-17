<?php

namespace Tests\SMST\Settings\Rules\Feature;

use SMST\Settings\Exceptions\SettingValidationException;
use Tests\SMST\Settings\Fixtures\Settings\ExampleStringSetting;
use Tests\SMST\Settings\TestCase;

/**
 * @group feature-tests
 * @group setting-tests
 * @group string-setting-tests
 */
class StringSettingValidationsTest extends TestCase
{
    /** @test */
    public function it_requires_setting_value_to_be_a_string()
    {
        $this->assertExceptionInstanceOf(function () {
            new ExampleStringSetting(123);
        }, SettingValidationException::class);
    }

    /** @test */
    public function it_requires_setting_value_to_be_string_on_update()
    {
        $this->assertExceptionInstanceOf(function () {
            (new ExampleStringSetting('string'))->setValue(123);
        }, SettingValidationException::class);
    }

    /** @test */
    public function it_allows_string_value()
    {
        $setting = new ExampleStringSetting('string value');

        $this->assertEquals('string value', $setting->value());
    }
}
