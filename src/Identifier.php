<?php

namespace Krixon\Identity;

/**
 * Implemented by classes which have identity not derived entirely from their properties.
 */
interface Identifier
{
    /**
     * @return string
     */
    public function __toString() : string;
    
    
    /**
     * @return string
     */
    public function id() : string;
    
    
    /**
     * Determines if this instance is equal to another.
     * 
     * @param Identifier $other
     *
     * @return bool
     */
    public function equals(Identifier $other) : bool;
}
