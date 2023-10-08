<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Exception;

final class OptionNotFoundException extends ControlException
{
    public function __construct(string $optionKey, string $controlClass)
    {
        parent::__construct(
            sprintf(
                'Control option with key "%s" was not found in "%s".',
                $optionKey,
                $controlClass
            )
        );
    }
}
