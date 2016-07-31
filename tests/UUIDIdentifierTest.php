<?php

namespace Krixon\Identity\Test;

use Krixon\Identity\UUIDIdentifier;

/**
 * @coversDefaultClass Krixon\Identity\UUIDIdentifier
 */
class UUIDIdentifierTest extends \PHPUnit_Framework_TestCase
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
