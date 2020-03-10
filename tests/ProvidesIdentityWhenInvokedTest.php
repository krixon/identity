<?php

namespace Krixon\Identity\Test;

use Krixon\Identity\Identifier;
use Krixon\Identity\InvokableIdentifier;
use Krixon\Identity\ProvidesIdentityWhenInvoked;
use Krixon\Identity\StoresIdentityAsSingleString;
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
        $identifier = self::create('foobar');

        self::assertSame((string) $identifier, $identifier());
    }


    private static function create(string $id) : InvokableIdentifier
    {
        return new class ($id) implements InvokableIdentifier
        {
            use StoresIdentityAsSingleString;
            use ProvidesIdentityWhenInvoked;


            public function __construct(string $id)
            {
                $this->id = $id;
            }
        };
    }
}
