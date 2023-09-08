<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone;

use Legobuilder\Framework\Widget\WidgetInterface;

interface ZoneInterface
{
    /**
     * @return WidgetInterface[]
     */
    public function getWidgets(): array;
}
