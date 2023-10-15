<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Collection\Exception;

use Exception;

final class ItemNotFoundException extends Exception
{
    public function __construct(string $itemKey)
    {
        parent::__construct(
            sprintf(
                'Item with key "%s" was not found.',
                $itemKey
            )
        );
    }
}
