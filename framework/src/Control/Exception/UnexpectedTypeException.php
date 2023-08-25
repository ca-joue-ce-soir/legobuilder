<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Exception;

final class UnexpectedTypeException extends ControlException
{
    public function __construct(mixed $value, string $expectedType)
    {
        parent::__construct(
            sprintf(
                'Expected argument of type "%s", "%s" given', 
                $expectedType, 
                get_debug_type($value)
            )
        );
    }
}
