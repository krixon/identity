<?php

declare(strict_types=1);

namespace Krixon\Identity;

interface IdentityProvider
{
    public function id() : Identifier;
    public function is(Identifier $identifier) : bool;
}
