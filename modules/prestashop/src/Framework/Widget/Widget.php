<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget;

use Legobuilder\Framework\Widget\Data\WidgetDataInterface;
use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;
use Legobuilder\Framework\Zone\Zone;

final class Widget implements WidgetInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Zone
     */
    private $zone;

    /**
     * @var WidgetDefinitionInterface
     */
    private $definition;

    /**
     * @var WidgetDataInterface
     */
    private $data;

    public function __construct(int $id, string $zone, WidgetDefinitionInterface $widgetDefinition)
    {
        $this->id = $id;
        $this->zone = $zone;
        $this->definition = $widgetDefinition;
    }

    /**
     * Get Widget ID.
     * 
     * @return int
     */
    public function getIdentifier(): int
    {
        return $this->id;
    }

    /**
     * Get the zone in which the widget is located.
     * 
     * @return Zone
     */
    public function getZone(): Zone
    {
        return $this->zone;
    }

    /**
     * Get Widget definition.
     *
     * @return WidgetDefinitionInterface
     */
    public function getDefinition(): WidgetDefinitionInterface
    {
        return $this->definition;
    }

    /**
     * Get Widget data.
     *
     * @return WidgetDataInterface
     */
    public function getData(): WidgetDataInterface
    {
        return $this->data;
    }
}
