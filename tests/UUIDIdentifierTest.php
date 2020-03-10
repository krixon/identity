<?php

namespace Krixon\Identity\Test;

use InvalidArgumentException;
use Krixon\Identity\UUIDIdentifier;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Krixon\Identity\UUIDIdentifier
 */
class UUIDIdentifierTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testCanInstantiate() : void
    {
        $uuid       = 'ef546385-6bf3-4f3e-89eb-7433d56ca7b2';
        $identifier = new UUIDIdentifier($uuid);

        self::assertSame($uuid, (string)$identifier);
    }


    /**
     * @dataProvider invalidInputProvider
     * @covers ::__construct
     * @covers ::normalize
     * @covers ::isValid
     */
    public function testThrowsOnInvalidInput(string $input) : void
    {
        $this->expectException(InvalidArgumentException::class);

        new UUIDIdentifier($input);
    }


    public static function invalidInputProvider() : array
    {
        return [
            'Too many characters'   => ['f74da6ed-30c9-4aac-b27b-ccddecb76405extra'],
            'Not enough characters' => ['f74da6ed-30c9-4aac-b27b-ccddec'],
            'Invalid characters'    => ['☺74da6ed-30c9-4aac-b27b-ccddecb76405'],
            'Hyphen in wrong place' => ['f74da6ed30-c9-4aac-b27b-ccddecb76405'],
        ];
    }


    /**
     * @covers ::generate
     */
    public function testCanGenerate() : void
    {
        $identifier = UUIDIdentifier::generate();

        self::assertInstanceOf(UUIDIdentifier::class, $identifier);
    }


    /**
     * @dataProvider normalizesInputProvider
     * @covers ::normalize
     */
    public static function testNormalizesInput(string $input, string $expected) : void
    {
        $identifier = new UUIDIdentifier($input);

        static::assertSame($expected, (string)$identifier);
    }


    public static function normalizesInputProvider() : array
    {
        return [
            'Canonical'                   => [
                'f74da6ed-30c9-4aac-b27b-ccddecb76405',
                'f74da6ed-30c9-4aac-b27b-ccddecb76405',
            ],
            'With braces'                 => [
                '{f74da6ed-30c9-4aac-b27b-ccddecb76405}',
                'f74da6ed-30c9-4aac-b27b-ccddecb76405',
            ],
            'Uppercase'                   => [
                'F74DA6ED-30C9-4AAC-B27B-CCDDECB76405',
                'f74da6ed-30c9-4aac-b27b-ccddecb76405',
            ],
            'Uppercase with braces'       => [
                '{F74DA6ED-30C9-4AAC-B27B-CCDDECB76405}',
                'f74da6ed-30c9-4aac-b27b-ccddecb76405',
            ],
            'Mixed case'                  => [
                'F74DA6ED-30C9-4AAC-b27b-ccddecb76405',
                'f74da6ed-30c9-4aac-b27b-ccddecb76405',
            ],
            'Mixed case with braces'      => [
                '{F74DA6ED-30C9-4AAC-b27b-ccddecb76405}',
                'f74da6ed-30c9-4aac-b27b-ccddecb76405',
            ],
            'No hyphens'                  => [
                'f74da6ed30c94aacb27bccddecb76405',
                'f74da6ed-30c9-4aac-b27b-ccddecb76405',
            ],
            'Uppercase with no hyphens'   => [
                'F74DA6ED30C94AACB27BCCDDECB76405',
                'f74da6ed-30c9-4aac-b27b-ccddecb76405',
            ],
            'Some hyphens'                => [
                'f74da6ed-30c94aacb27b-ccddecb76405',
                'f74da6ed-30c9-4aac-b27b-ccddecb76405',
            ],
            'Uppercase with some hyphens' => [
                'F74DA6ED-30C94AACB27B-CCDDECB76405',
                'f74da6ed-30c9-4aac-b27b-ccddecb76405',
            ],
        ];
    }
}
