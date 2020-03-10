<?php

declare(strict_types=1);

namespace Krixon\Identity;

/**
 * Can be implemented by identifiers which provide their identity when invoked.
 *
 * For example:
 *
 * ```
 * $foo    = new SomeIdentifier();
 * $string = $foo();
 * ```
 */
trait ProvidesIdentityWhenInvoked
{
    abstract public function __toString() : string;


    final public function __invoke() : string
    {
        return (string) $this;
    }
}
