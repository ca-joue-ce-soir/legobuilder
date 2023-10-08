<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Exception;

class EndpointTypeException extends EndpointException
{
    public function __construct(string $typeClass)
    {
        parent::__construct(sprintf('Endpoint type %s is missing from Type Loader.', $typeClass));
    }
}
