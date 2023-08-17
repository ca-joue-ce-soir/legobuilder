<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget;

use Legobuilder\Framework\Widget\Data\WidgetDataInterface;
use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;
use Legobuilder\Framework\Zone\Zone;

interface WidgetInterface
{
    /**
     * Get Widget ID.
     * 
     * @return int
     */
    public function getIdentifier(): int;

    /**
     * Get the zone in which the widget is located.
     * 
     * @return Zone
     */
    public function getZone(): Zone;

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
