<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition\Registry;

use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;

interface WidgetDefinitionRegistryInterface
{
    /**
     * Get Widgets registered.
     *
     * @return array
     */
    public function getRegisteredWidgets(): array;

    /**
     * Register a new widget definition.
     * 
     * @param WidgetDefinitionInterface $widgetDefinition
     */
    public function registerWidget(WidgetDefinitionInterface $widgetDefinition): self;
}
