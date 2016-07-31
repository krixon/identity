<?php

namespace Krixon\Identity\Test\Fixtures;

use Krixon\Identity\ProvidesIdentityWhenInvoked;
use Krixon\Identity\StoresIdentityAsSingleString;

class InvokableIdentifier
{
    use StoresIdentityAsSingleString;
    use ProvidesIdentityWhenInvoked;
    
    
    /**
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
}
