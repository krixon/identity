<?php

namespace Krixon\Identity;

trait StoresIdentityAsSingleString
{
    /**
     * @var string
     */
    private $id;
    
    
    /**
     * @inheritdoc
     */
    final public function __toString() : string
    {
        return $this->id();
    }
    
    
    /**
     * @inheritdoc
     */
    final public function id() : string
    {
        return $this->id;
    }
    
    
    /**
     * @inheritdoc
     */
    final public function equals(Identifier $other) : bool
    {
        return ($other instanceof static) && ($this->id() === $other->id());
    }
}
