<?php

namespace Krixon\Identity;

abstract class CompositeIdentifier implements Identifier
{
    use StoresIdentityAsSingleString;
    
    
    /**
     * @param array  $identifiers An array of values which can be safely cast to strings.
     * @param string $separator   A string used to separate identifier components.
     */
    public function __construct(array $identifiers, string $separator = '|')
    {
        $this->id = implode($separator, $identifiers);
    }
}
