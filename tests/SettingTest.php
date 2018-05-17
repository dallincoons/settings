<?php

namespace Tests\SMST\Settings;

use Tests\SMST\Settings\Fixtures\Settings\ExampleStringSetting;
use Tests\SMST\Settings\Fixtures\Settings\ExampleWithDefaultValue;

class SettingTest extends TestCase
{
    /**
     * @covers \SMST\Settings\Setting::__construct
     *
     * @test
     */
    public function it_uses_default_value_when_none_is_defined()
    {
        $setting = new ExampleStringSetting();

        $this->assertEquals('', $setting->value());
    }

    /**
     * @covers \SMST\Settings\Setting::__construct
     *
     * @test
     */
    public function it_uses_default_value_when_it_is_defined()
    {
        $setting = new ExampleWithDefaultValue();

        $this->assertEquals(ExampleWithDefaultValue::DEFAULT_VALUE, $setting->value());
    }

    /**
     * @covers \SMST\Settings\Setting::value
     *
     * @test
     */
    public function it_retrieves_value()
    {
        $setting = new ExampleStringSetting('value456');

        $this->assertEquals('value456', $setting->value());
    }

    /**
     * @covers \SMST\Settings\Setting::key
     *
     * @test
     */
    public function it_gets_key_based_on_class_name()
    {
        $setting = new ExampleStringSetting;

        $this->assertEquals('example_string_setting', $setting->key());
    }
}
