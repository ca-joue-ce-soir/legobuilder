<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Zone;

use Legobuilder\Framework\Engine\Widget\WidgetInterface;

final class Zone implements ZoneInterface
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var array $parameters The parameters for the zone.
     */
    private $parameters = [];

    /**
     * @var WidgetInterface[] $widgets The widgets contained within the zone.
     */
    private $widgets;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
        $this->widgets = [];
    }

    /**
     * Retrieves the identifier of the object.
     *
     * @return mixed The identifier of the object.
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Get the parameters of the PHP function.
     *
     * @return array The parameters of the function.
     */
    public function getParameters(): array
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
    public function render(): string
    {
        $renderOutput = '';

        foreach ($this->getWidgets() as $widget) {
            $renderOutput .= $widget->getDefinition()->render($widget);
        }

        return $renderOutput;
    }
}
