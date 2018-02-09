<?php

namespace Krixon\Identity;

/**
 * A UUID based identifier.
 */
class UUIDIdentifier implements Identifier
{
    use StoresIdentityAsSingleString;
    use ProvidesIdentityWhenInvoked;
    
    
    /**
     * @param string $value
     */
    final public function __construct(string $value)
    {
        $this->id = self::normalize($value);
    }
    
    
    /**
     * Generates a new version 4 UUID.
     * 
     * @return static
     */
    final public static function generate()
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
     * @throws \InvalidArgumentException
     */
    private static function normalize(string $uuid) : string
    {
        $uuid = trim($uuid);
        
        if (!self::isValid($uuid)) {
            throw new \InvalidArgumentException('Supplied value is not a valid UUID.');
        }
        
        return strtolower(trim($uuid, '{}'));
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
        return (bool)preg_match('/^\{?[a-f\d]{8}-(?:[a-f\d]{4}-){3}[a-f\d]{12}\}?$/i', $uuid);
    }
}
