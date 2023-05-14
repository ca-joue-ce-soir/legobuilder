<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Option\Exception;

use InvalidArgumentException;

final class UnknownControlOptionException extends InvalidArgumentException
{
    public function __construct(string $optionKey)
    {
        parent::__construct(sprintf('The option you specified %s does not exist in the current context.', $optionKey));
    }
}
