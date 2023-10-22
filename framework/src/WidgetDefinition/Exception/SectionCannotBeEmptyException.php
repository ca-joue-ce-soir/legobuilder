<?php

declare(strict_types=1);

namespace Legobuilder\Framework\WidgetDefinition\Exception;

use Exception;

class SectionCannotBeEmptyException extends Exception
{
    public function __construct()
    {
        parent::__construct('Section cannot be empty');
    }
}
