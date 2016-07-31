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
        return new static(sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            
            // 32 bits for "time_low".
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            
            // 16 bits for "time_mid".
            mt_rand(0, 0xffff),
            
            // 16 bits for "time_hi_and_version"; four most significant bits holds version number 4.
            mt_rand(0, 0x0fff) | 0x4000,
            
            // 16 bits, 8 bits for "clk_seq_hi_res", 8 bits for "clk_seq_low".
            // Two most significant bits holds zero and one for variant DCE1.1.
            mt_rand(0, 0x3fff) | 0x8000,
            
            // 48 bits for "node".
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        ));
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
