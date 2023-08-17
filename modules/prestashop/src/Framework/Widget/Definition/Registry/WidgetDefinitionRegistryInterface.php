<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition\Registry;

use Legobuilder\Framework\Widget\Definition\WidgetDefinition;
use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;

interface WidgetDefinitionRegistryInterface
{
    /**
     * Get Widgets registered.
     *
     * @return WidgetDefinitionInterface[]
     */
    public function getRegisteredWidgetsDefinitions(): array;

    /**
     * Register a new Widget Definition.
     * 
     * @param WidgetDefinitionInterface $widgetDefinition
     */
    public function registerWidgetDefinition(WidgetDefinitionInterface $widgetDefinition): self;

    /**
     * Get a registered Widget Definition.
     * 
     * @return WidgetDefinitionInterface
     */
    public function getWidgetDefinition(string $id): WidgetDefinitionInterface;
}
