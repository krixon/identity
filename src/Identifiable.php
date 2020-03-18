<?php

declare(strict_types=1);

namespace Krixon\Identity;

trait Identifiable
{
    protected Identifier $id;


    public function id() : Identifier
    {
        return $this->id;
    }


    public function is(Identifier $id) : bool
    {
        return $this->id->equals($id);
    }
}
