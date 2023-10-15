<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\WidgetDefinition\Registry;

use Legobuilder\Framework\Engine\WidgetDefinition\WidgetDefinitionInterface;

interface WidgetDefinitionRegistryInterface
{
    /**
     * Get Widgets Definitions.
     *
     * @return WidgetDefinitionInterface[]
     */
    public function getWidgetsDefinitions(): array;

    /**
     * Register a new Widget Definition.
     *
     * @param WidgetDefinitionInterface $widgetDefinition
     */
    public function registerWidgetDefinition(WidgetDefinitionInterface $widgetDefinition): self;

    /**
     * Get a Widget Definition.
     *
     * @return WidgetDefinitionInterface
     */
    public function getWidgetDefinition(string $id): WidgetDefinitionInterface;
}