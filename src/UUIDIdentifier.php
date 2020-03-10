<?php

declare(strict_types=1);

namespace Krixon\Identity;

use Exception;
use InvalidArgumentException;
use function substr_replace;

/**
 * A v4 UUID based identifier.
 */
class UUIDIdentifier implements Identifier
{
    use StoresIdentityAsSingleString;
    use ProvidesIdentityWhenInvoked;


    /**
     * @throws InvalidArgumentException If the supplied string is not a valid UUID.
     */
    final public function __construct(string $uuid)
    {
        $this->id = self::normalize($uuid);
    }


    /**
     * @return static
     * @throws Exception If there is no available source of random bytes.
     */
    final public static function generate() : self
    {
        $data = random_bytes(16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // Set version to 0100.
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // Set bits 6-7 to 10.

        return new static(vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4)));
    }


    /**
     * Normalizes a UUID string.
     *
     * Ensures UUIDs are lower case and are stripped of surrounding braces.
     *
     * @param string $uuid
     *
     * @return string
     * @throws InvalidArgumentException If the supplied string is not a valid UUID.
     */
    private static function normalize(string $uuid) : string
    {
        $uuid = trim($uuid);

        if (!self::isValid($uuid)) {
            throw new InvalidArgumentException('Supplied value is not a valid UUID.');
        }

        $uuid = strtolower(trim($uuid, '{}'));

        // Add missing hyphens.
        foreach ([8, 13, 18,23] as $position) {
            if ($uuid[$position] !== '-') {
                $uuid = substr_replace($uuid, '-', $position, 0);
            }
        }

        return $uuid;
    }


    /**
     * Validates a UUID string.
     *
     * @param string $uuid
     *
     * @return bool
     */
    private static function isValid($uuid) : bool
    {
        return (bool) preg_match('/^{?[a-f\d]{8}-?(?:[a-f\d]{4}-?){3}[a-f\d]{12}}?$/i', $uuid);
    }
}
