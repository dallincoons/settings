<?php

namespace Tests\SMST\Settings\Unit\Rules;

use SMST\Settings\Exceptions\SettingValidationException;
use SMST\Settings\Rules\IsBoolean;
use Tests\SMST\Settings\TestCase;

/**
 * @group unit-tests
 * @group rules-tests
 * @group is-boolean-rule-test
 */
class IsBooleanTest extends TestCase
{
    /**
     * @covers \SMST\Settings\Rules\IsBoolean::isValid
     *
     * @dataProvider succeededValidationValueProvider
     *
     * @param mixed $value
     *
     * @test
     */
    public function it_passes_when_value_is_boolean($value)
    {
        $this->assertTrue(IsBoolean::isValid($value));
    }

    public function succeededValidationValueProvider()
    {
        return [
            [true],
            [false]
        ];
    }

    /**
     * @covers \SMST\Settings\Rules\IsBoolean::isValid
     *
     * @dataProvider failedValidationValueProvider
     *
     * @param mixed $value
     *
     * @test
     */
    public function it_fails_when_values_are_not_boolean($value)
    {
        $this->assertFalse(IsBoolean::isValid($value));
    }

    public function failedValidationValueProvider()
    {
        return [
            [1],
            ['test'],
            [new \stdClass],
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
            IsBoolean::reportError('test');
        }, SettingValidationException::class);
    }
}
