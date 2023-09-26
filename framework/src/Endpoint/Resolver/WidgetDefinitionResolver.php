<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;

class WidgetDefinitionResolver
{
    /**
     * @var WidgetDefinitionRegistryInterface
     */
    private $widgetDefinitionRegistry;

    public function __construct(WidgetDefinitionRegistryInterface $widgetDefinitionRegistry)
    {
        $this->widgetDefinitionRegistry = $widgetDefinitionRegistry;
    }

    /**
     * Retrieve all the widgets definitions registered in the current engine and
     * formats them correctly to match the GraphQL type.
     *
     * @return array Widgets definitions
     */
    public function getWidgetDefinitions(): array
    {
        return $this->widgetDefinitionRegistry->getWidgetsDefinitions();
    }
}