<?php

namespace Krixon\Identity;

trait Identifiable
{
    private Identifier $id;
    
    
    public function id() : Identifier
    {
        return $this->id;
    }
    
    
    public function is(Identifier $id) : bool
    {
        return $this->id->equals($id);
    }
}
