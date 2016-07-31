<?php

namespace Krixon\Identity;

/**
 * Classes which have an identity should implement this interface.
 */
interface IdentityProvider
{
    /**
     * @return Identifier
     */
    public function id() : Identifier;
}
