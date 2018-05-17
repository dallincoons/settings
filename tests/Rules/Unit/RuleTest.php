<?php

namespace Tests\SMST\Settings\Unit\Rules;

use Tests\SMST\Settings\Fixtures\Settings\ExampleFailsWithoutErrorReporting;
use Tests\SMST\Settings\TestCase;

/**
 * @group unit-tests
 * @group rules-tests
 */
class RuleTest extends TestCase
{
    /** @test */
    public function it_throws_generic_error_message_when_rule_does_not_define_its_own()
    {
        $this->assertException(function () {
            new ExampleFailsWithoutErrorReporting('key', 'value');
        }, function (\Throwable $e) {
            $this->assertContains('Validation failed', $e->getMessage());
        });
    }
}
