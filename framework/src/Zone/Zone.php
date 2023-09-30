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

    public function getDefinition(): ZoneDefinitionInterface
    {
        return $this->definition;
    }

    public function getParameters(): ?array
    {
        return $this->parameters;
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

    /**
     * Renders a zone by iterating over its widgets and calling their
     * render method with the provided renderer.
     *
     * @return string The rendered zone.
     */
    public function render(ZoneInterface $zone): string
    {
        $renderOutput = '';

        foreach ($zone->getWidgets() as $widget) {
            $renderOutput .= $widget->getDefinition()->render($widget);
        }

        return $renderOutput;
    }
}
