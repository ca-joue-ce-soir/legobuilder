<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition\Registry;

use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;

final class WidgetDefinitionRegistry implements WidgetDefinitionRegistryInterface
{
    /**
     * @var array
     */
    private $widgetsDefinitions;

    public function __construct()
    {
        $this->widgetsDefinitions = [];
    }

    /**
     * Get Widgets.
     *
     * @return array
     */
    public function getWidgetsDefinitions(): array
    {
        return $this->widgetsDefinitions;
    }

    /**
     * Register a new widget definition.
     * 
     * @param WidgetDefinitionInterface $widgetDefinition
     */
    public function registerWidgetDefinition(WidgetDefinitionInterface $widgetDefinition): self
    {
        $this->widgetsDefinitions[$widgetDefinition->getId()] = $widgetDefinition;

        return $this;
    }

    /**
     * Get a Widget Definition.
     * 
     * @return WidgetDefinitionInterface
     */
    public function getWidgetDefinition(string $id): WidgetDefinitionInterface
    {
        return $this->widgetsDefinitions[$id];
    }
}
