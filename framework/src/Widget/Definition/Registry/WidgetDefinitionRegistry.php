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
    public function getRegisteredWidgets(): array
    {
        return $this->registeredDefinitions;
    }

    /**
     * Register a new widget definition.
     * 
     * @param WidgetDefinitionInterface $widgetDefinition
     */
    public function registerWidget(WidgetDefinitionInterface $widgetDefinition): self
    {
        $this->registeredDefinitions[get_class($widgetDefinition)] = $widgetDefinition;

        return $this;
    }
}
