<?php

namespace Krixon\Identity\Test;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Krixon\Identity\ProvidesIdentityWhenInvoked
 */
class ProvidesIdentityWhenInvokedTest extends TestCase
{
    /**
     * @covers ::__invoke
     */
    public function testInvoke()
    {
        $identifier = new Fixtures\InvokableIdentifier('foobar');

        self::assertSame((string) $identifier, $identifier());
    }
}
