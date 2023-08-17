<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition\Registry;

use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;

final class WidgetDefinitionRegistry implements WidgetDefinitionRegistryInterface
{
    /**
     * @var array
     */
    private $registeredDefinitions;

    public function __construct()
    {
        $this->registeredDefinitions = [];
    }

    /**
     * Get Widgets registered.
     *
     * @return array
     */
    public function getRegisteredWidgetsDefinitions(): array
    {
        return $this->registeredDefinitions;
    }

    /**
     * Register a new widget definition.
     * 
     * @param WidgetDefinitionInterface $widgetDefinition
     */
    public function registerWidgetDefinition(WidgetDefinitionInterface $widgetDefinition): self
    {
        $this->registeredDefinitions[$widgetDefinition->getId()] = $widgetDefinition;

        return $this;
    }

    /**
     * Get a registered Widget Definition.
     * 
     * @return WidgetDefinitionInterface
     */
    public function getWidgetDefinition(string $id): WidgetDefinitionInterface
    {
        return $this->registeredDefinitions[$id];
    }
}
