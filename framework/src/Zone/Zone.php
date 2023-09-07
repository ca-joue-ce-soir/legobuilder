<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone;

use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\WidgetInterface;

/**
 * The `Zone` class represents a zone in a web page and is responsible for 
 * rendering the widgets contained within the zone.
 */
final class Zone implements ZoneInterface
{
    /**
     * @var string $definition The definition of the zone.
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

    /**
     * Adds a widget to the zone.
     *
     * @param WidgetInterface $widget The widget to add.
     * @return Zone The current zone object.
     */
    public function addWidget(WidgetInterface $widget): Zone
    {
        $this->widgets[] = $widget;

        return $this;
    }

    /**
     * Renders the zone and its widgets using the provided renderer and returns the rendered output as a string.
     *
     * @param RendererInterface $renderer The renderer to use.
     * @return string The rendered output.
     */
    public function render(RendererInterface $renderer): string
    {
        $zoneRender = '';

        foreach ($this->widgets as $widget) {
            $zoneRender .= $widget->render($renderer);
        }

        return $zoneRender;
    }
}
