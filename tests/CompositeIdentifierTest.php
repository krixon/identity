<?php

namespace Krixon\Identity\Test;

use Krixon\Identity\CompositeIdentifier;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Krixon\Identity\CompositeIdentifier
 */
class CompositeIdentifierTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testCanInstantiate()
    {
        $identifier = new CompositeIdentifier(['foo', 'bar', 'baz']);

        self::assertSame('foo|bar|baz', (string) $identifier);
    }
}
