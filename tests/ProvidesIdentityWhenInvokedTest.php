<?php

namespace Krixon\Identity\Test;

/**
 * @coversDefaultClass Krixon\Identity\ProvidesIdentityWhenInvoked
 */
class ProvidesIdentityWhenInvokedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__invoke
     */
    public function testInvoke()
    {
        $identifier = new Fixtures\InvokableIdentifier('foobar');
        
        self::assertSame($identifier->id(), $identifier());
    }
}
