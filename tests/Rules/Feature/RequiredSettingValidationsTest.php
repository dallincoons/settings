<?php

namespace Tests\SMST\Settings\Rules\Feature;

use SMST\Settings\Exceptions\SettingValidationException;
use Tests\SMST\Settings\Fixtures\Settings\ExampleRequiredSetting;
use Tests\SMST\Settings\TestCase;

/**
 * @group feature-tests
 * @group setting-tests
 * @group required-setting-tests
 */
class RequiredSettingValidationsTest extends TestCase
{
    /** @test */
    public function it_requires_setting_value_to_be_non_empty()
    {
        $this->assertExceptionInstanceOf(function () {
            new ExampleRequiredSetting('');
        }, SettingValidationException::class);
    }

    /** @test */
    public function it_requires_setting_value_to_be_non_empty_on_update()
    {
        $this->assertExceptionInstanceOf(function () {
            (new ExampleRequiredSetting('non empty'))->setValue('');
        }, SettingValidationException::class);
    }

    /** @test */
    public function it_allows_filled_string_value()
    {
        $setting = new ExampleRequiredSetting('non empty');

        $this->assertEquals('non empty', $setting->value());
    }
}
