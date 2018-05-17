<?php

namespace Tests\SMST\Settings\Rules\Feature;

use SMST\Settings\Rules\IsString;
use SMST\Settings\Rules\Required;
use Tests\SMST\Settings\Fixtures\Settings\ExampleFilledStringSetting;
use Tests\SMST\Settings\TestCase;

/**
 * @group feature-tests
 * @group setting-tests
 * @group combined-rule-setting-tests
 */
class CombinedRuleValidatesTest extends TestCase
{
    /** @test */
    public function it_fails_for_empty_value()
    {
        $this->assertException(function () {
            new ExampleFilledStringSetting('');
        }, function (\Throwable $e) {
            $this->assertContains(Required::ERROR_MESSAGE, $e->getMessage());
        });
    }

    /** @test */
    public function it_fails_for_non_string_value()
    {
        $this->assertException(function () {
            new ExampleFilledStringSetting(2);
        }, function (\Throwable $e) {
            $this->assertContains(IsString::ERROR_MESSAGE, $e->getMessage());
        });
    }

    /** @test */
    public function it_allows_non_empty_string()
    {
        $setting = new ExampleFilledStringSetting('non empty string');

        $this->assertEquals('non empty string', $setting->value());
    }
}
