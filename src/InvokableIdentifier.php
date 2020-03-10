<?php

declare(strict_types=1);

namespace Krixon\Identity;

interface InvokableIdentifier
{
    public function __invoke() : string;
}
