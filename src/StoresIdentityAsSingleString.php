<?php

declare(strict_types=1);

namespace Krixon\Identity;

trait StoresIdentityAsSingleString
{
    protected string $id;


    final public function __toString() : string
    {
        return $this->id;
    }


    final public function equals(Identifier $other) : bool
    {
        return static::class === get_class($other)
            && $this->id === $other->id;
    }
}
