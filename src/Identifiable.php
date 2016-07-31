<?php

namespace Krixon\Identity;

trait Identifiable
{
    
    /**
     * @var Identifier
     */
    private $id;
    
    
    /**
     * @return Identifier
     */
    public function id() : Identifier
    {
        return $this->id;
    }
    
    
    /**
     * @param Identifier $id
     *
     * @return bool
     */
    public function is(Identifier $id) : bool
    {
        return $this->id->equals($id);
    }
}
