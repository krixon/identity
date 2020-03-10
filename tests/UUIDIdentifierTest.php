<?php

namespace Krixon\Identity\Test;

use Krixon\Identity\UUIDIdentifier;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass Krixon\Identity\UUIDIdentifier
 */
class UUIDIdentifierTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testCanInstantiate()
    {
        $uuid       = 'ef546385-6bf3-4f3e-89eb-7433d56ca7b2';
        $identifier = new UUIDIdentifier($uuid);
        
        self::assertSame($uuid, $identifier->id());
    }
    
    
    /**
     * @covers ::generate
     */
    public function testCanGenerate()
    {
        $identifier = UUIDIdentifier::generate();
        
        self::assertInstanceOf(UUIDIdentifier::class, $identifier);
    }
}
