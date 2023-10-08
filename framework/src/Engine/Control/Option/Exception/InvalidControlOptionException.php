<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Option\Exception;

use InvalidArgumentException;

class InvalidControlOptionException extends InvalidArgumentException
{
    public function __construct(string $optionKey)
    {
        parent::__construct(sprintf('Control "%s" is not valid.', $optionKey));
    }
}
