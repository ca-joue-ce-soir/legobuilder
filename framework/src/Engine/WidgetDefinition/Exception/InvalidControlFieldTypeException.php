<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\WidgetDefinition\Exception;

use Exception;

class InvalidControlFieldTypeException extends Exception
{
    public function __construct()
    {
        parent::__construct('Invalid control field type');
    }
}
