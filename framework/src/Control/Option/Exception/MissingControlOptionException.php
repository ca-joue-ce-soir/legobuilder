<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Option\Exception;

use InvalidArgumentException;

final class MissingControlOptionException extends InvalidArgumentException
{
    public function __construct(string $optionKey)
    {
        parent::__construct(sprintf('Control %s is missing.', $optionKey));
    }
}
