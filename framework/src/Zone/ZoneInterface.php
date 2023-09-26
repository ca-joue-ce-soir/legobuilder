<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone;

use Legobuilder\Framework\Widget\WidgetInterface;
use Legobuilder\Framework\Zone\Definition\ZoneDefinitionInterface;

interface ZoneInterface
{
    public function getDefinition(): ZoneDefinitionInterface;

    public function getParameters(): ?array;

    /**
     * @return WidgetInterface[]
     */
    public function getWidgets(): array;
}
