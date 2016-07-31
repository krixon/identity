<?php

namespace Krixon\Identity\Test;

/**
 * @coversDefaultClass Krixon\Identity\CompositeIdentifier
 */
class CompositeIdentifierTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     */
    public function testCanInstantiate()
    {
        $identifier = new Fixtures\CompositeIdentifier(['foo', 'bar', 'baz']);
        
        self::assertSame('foo|bar|baz', $identifier->id());
    }
}
