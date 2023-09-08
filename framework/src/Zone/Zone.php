<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone;

use Legobuilder\Framework\Widget\WidgetInterface;
use Legobuilder\Framework\Zone\Definition\ZoneDefinitionInterface;

/**
 * The `Zone` class represents a zone in a web page.
 */
final class Zone implements ZoneInterface
{
    /**
     * @var ZoneDefinitionInterface
     */
    private $definition;

    /**
     * @var array $parameters The parameters for the zone.
     */
    private $parameters;

    /**
     * @var WidgetInterface[] $widgets The widgets contained within the zone.
     */
    private $widgets;

    public function __construct(ZoneDefinitionInterface $definition)
    {
        $this->definition = $definition;
    }

    /**
     * Adds a widget to the zone.
     *
     * @param  WidgetInterface $widget The widget to add.
     * @return Zone The current zone object.
     */
    public function addWidget(WidgetInterface $widget): Zone
    {
        $this->widgets[] = $widget;

        return $this;
    }

    public function getWidgets(): array
    {
        return $this->widgets;
    }
}
