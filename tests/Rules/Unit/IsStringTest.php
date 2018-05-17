<?php

namespace Tests\SMST\Settings\Unit\Rules;

use SMST\Settings\Exceptions\SettingValidationException;
use SMST\Settings\Rules\IsString;
use Tests\SMST\Settings\TestCase;

/**
 * @group unit-tests
 * @group rules-tests
 * @group is-string-rule-test
 */
class IsStringTest extends TestCase
{
    /**
     * @covers \SMST\Settings\Rules\IsString::isValid
     *
     * @dataProvider succeededValidationValueProvider
     *
     * @param mixed $value
     *
     * @test
     */
    public function it_passes_when_value_is_string($value)
    {
        $this->assertTrue(IsString::isValid($value));
    }

    public function succeededValidationValueProvider()
    {
        return [
            ['string'],
            [''],
        ];
    }

    /**
     * @covers \SMST\Settings\Rules\IsString::isValid
     *
     * @dataProvider failedValidationValueProvider
     *
     * @param mixed $value
     *
     * @test
     */
    public function it_fails_when_values_are_not_strings($value)
    {
        $this->assertFalse(IsString::isValid($value));
    }

    public function failedValidationValueProvider()
    {
        return [
            [0],
            [new \stdClass],
            [null],
            [true]
        ];
    }

    /**
     * @covers \SMST\Settings\Rules\IsNumeric::reportError
     *
     * @test
     */
    public function it_throws_error()
    {
        $this->assertExceptionInstanceOf(function () {
            IsString::reportError('test');
        }, SettingValidationException::class);
    }
}
