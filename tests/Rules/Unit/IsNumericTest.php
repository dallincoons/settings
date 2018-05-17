<?php

namespace Tests\SMST\Settings\Unit\Rules;

use SMST\Settings\Exceptions\SettingValidationException;
use SMST\Settings\Rules\IsNumeric;
use Tests\SMST\Settings\TestCase;

/**
 * @group unit-tests
 * @group rules-tests
 * @group is-numeric-rule-test
 */
class IsNumericTest extends TestCase
{
    /**
     * @covers \SMST\Settings\Rules\IsNumeric::isValid
     *
     * @dataProvider succeededValidationValueProvider
     *
     * @param mixed $value
     *
     * @test
     */
    public function it_passes_when_value_is_numeric($value)
    {
        $this->assertTrue(IsNumeric::isValid($value));
    }

    public function succeededValidationValueProvider()
    {
        return [
            [1],
            [1.1],
        ];
    }

    /**
     * @covers \SMST\Settings\Rules\IsNumeric::isValid
     *
     * @dataProvider failedValidationValueProvider
     *
     * @param mixed $value
     *
     * @test
     */
    public function it_fails_when_values_are_not_numeric($value)
    {
        $this->assertFalse(IsNumeric::isValid($value));
    }

    public function failedValidationValueProvider()
    {
        return [
            ['test'],
            [true],
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
            IsNumeric::reportError('test');
        }, SettingValidationException::class);
    }
}
