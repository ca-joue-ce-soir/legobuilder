<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Option\Exception;

use InvalidArgumentException;

class NotFoundControlOptionException extends InvalidArgumentException
{
    public function __construct(string $optionKey)
    {
        parent::__construct(sprintf('Control %s is missing.', $optionKey));
    }
}
