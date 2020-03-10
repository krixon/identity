<?php

declare(strict_types=1);

namespace Krixon\Identity;

trait StoresIdentityAsSingleString
{
    private string $id;


    final public function __toString() : string
    {
        return $this->id;
    }


    final public function equals(Identifier $other) : bool
    {
        return self::class === get_class($other)
            && $this->id === $other->id;
    }
}
