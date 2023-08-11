<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Option\Exception;

use InvalidArgumentException;

final class InvalidControlOptionException extends InvalidArgumentException
{
    public function __construct(string $optionKey, mixed $value)
    {
        parent::__construct(sprintf('.', $optionKey));
    }
}
