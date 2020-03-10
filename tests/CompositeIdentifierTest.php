<?php

namespace Krixon\Identity\Test;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass Krixon\Identity\CompositeIdentifier
 */
class CompositeIdentifierTest extends TestCase
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
