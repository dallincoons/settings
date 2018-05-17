<?php

namespace Tests\SMST\Settings\Unit\Rules;

use SMST\Settings\Exceptions\SettingValidationException;
use SMST\Settings\Rules\Required;
use Tests\SMST\Settings\TestCase;

/**
 * @group unit-tests
 * @group rules-tests
 * @group required-rule-test
 */
class RequiredTest extends TestCase
{
    /**
     * @covers \SMST\Settings\Rules\Required::isValid
     *
     * @test
     */
    public function it_succeeds_for_non_empty_value()
    {
        $this->assertTrue(Required::isValid('not empty'));
    }

    /**
     * @covers \SMST\Settings\Rules\Required::isValid
     *
     * @dataProvider emptyValueProvider
     *
     * @param mixed $value
     * 
     * @test
     */
    public function it_fails_for_empty_values($value)
    {
        $this->assertFalse(Required::isValid($value));
    }

    public function emptyValueProvider()
    {
        return [
            [''],
            [0],
            [0.0],
            [null],
            [[]]
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
            Required::reportError('test');
        }, SettingValidationException::class);
    }
}
