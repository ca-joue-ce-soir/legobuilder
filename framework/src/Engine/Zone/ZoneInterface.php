<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Zone;

use Legobuilder\Framework\Engine\Widget\WidgetInterface;

interface ZoneInterface
{
    /**
     * Get zone parameters.
     *
     * @return array
     */
    public function getParameters(): array;

    /**
     * @return WidgetInterface[]
     */
    public function getWidgets(): array;

    /**
     * Render the zone.
     */
    public function render(): string;
}
