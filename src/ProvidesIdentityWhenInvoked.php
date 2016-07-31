<?php

namespace Krixon\Identity;

trait ProvidesIdentityWhenInvoked
{
    abstract public function id() : string;
    
    
    final public function __invoke() : string
    {
        return $this->id();
    }
}
