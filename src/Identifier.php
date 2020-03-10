<?php

namespace Krixon\Identity;

/**
 * Implemented by classes which have identity not derived entirely from their properties.
 */
interface Identifier
{
    public function __toString() : string;
    public function equals(self $other) : bool;
}
