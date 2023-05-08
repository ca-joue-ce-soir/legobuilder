<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget;

use Legobuilder\Framework\Widget\Data\WidgetDataInterface;
use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;

interface WidgetInterface
{
    /**
     * Get Widget definition.
     *
     * @return WidgetDefinitionInterface
     */
    public function getDefinition(): WidgetDefinitionInterface;

    /**
     * Get Widget data.
     *
     * @return WidgetDataInterface
     */
    public function getData(): WidgetDataInterface;
}
