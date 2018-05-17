<?php

namespace Tests\SMST\Settings\SettingTypes\Unit;

use SMST\Settings\Exceptions\NotInPresetException;
use Tests\SMST\Settings\Fixtures\Settings\ExamplePresetSetting;
use Tests\SMST\Settings\TestCase;

/**
 * @group unit-tests
 * @group setting-tests
 * @group preset-setting-tests
 */
class PresetSettingTest extends TestCase
{
    /**
     * @covers \SMST\Settings\SettingTypes\PresetSetting::__construct
     * @covers \SMST\Settings\SettingTypes\PresetSetting::presets
     *
     * @test
     */
    public function it_requires_value_to_be_in_preset()
    {
        $this->assertExceptionInstanceOf(function () {
            new ExamplePresetSetting('not-in-preset');
        }, NotInPresetException::class);
    }

    /**
     * @covers \SMST\Settings\SettingTypes\PresetSetting::__construct
     * @covers \SMST\Settings\SettingTypes\PresetSetting::presets
     *
     * @test
     */
    public function it_uses_strict_comparison_with_presets()
    {
        $this->assertExceptionInstanceOf(function () {
            new ExamplePresetSetting(2);
        }, NotInPresetException::class);
    }

    /**
     * @covers \SMST\Settings\SettingTypes\PresetSetting::__construct
     * @covers \SMST\Settings\SettingTypes\PresetSetting::presets
     *
     * @test
     */
    public function it_uses_allows_value_with_valid_preset()
    {
        $setting = new ExamplePresetSetting('preset1');

        $this->assertEquals('preset1', $setting->value());
    }
}
