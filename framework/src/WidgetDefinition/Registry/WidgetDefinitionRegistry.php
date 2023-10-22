<?php

declare(strict_types=1);

namespace Legobuilder\Framework\WidgetDefinition\Registry;

use Legobuilder\Framework\WidgetDefinition\WidgetDefinitionInterface;

final class WidgetDefinitionRegistry implements WidgetDefinitionRegistryInterface
{
    /**
     * @var array
     */
    private $widgetDefinitions;

    public function __construct()
    {
        $this->widgetDefinitions = [];
    }

    /**
     * Returns all the registered widget definitions.
     *
     * @return array
     */
    public function getWidgetsDefinitions(): array
    {
        return $this->widgetDefinitions;
    }

    /**
     * Registers a new widget definition by adding it to the array of widget definitions.
     *
     * @todo Add the controls object to the widget definitions instead of type class.
     *
     * @param  WidgetDefinitionInterface $widgetDefinition
     * @return self
     */
    public function registerWidgetDefinition(WidgetDefinitionInterface $widgetDefinition): self
    {
        $this->widgetDefinitions[$widgetDefinition->getId()] = $widgetDefinition;

        return $this;
    }

    /**
     * Retrieves a specific widget definition by its ID.
     *
     * @param  string $id
     * @return WidgetDefinitionInterface
     */
    public function getWidgetDefinition(string $id): WidgetDefinitionInterface
    {
        return $this->widgetDefinitions[$id];
    }
}
