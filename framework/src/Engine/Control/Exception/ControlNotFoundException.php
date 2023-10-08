<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Exception;

final class ControlNotFoundException extends ControlException
{
    public function __construct(string $controlId)
    {
        parent::__construct(
            sprintf(
                'Control with id "%s" was not found.',
                $controlId
            )
        );
    }
}
