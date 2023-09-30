<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;

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
     * Retrieve all the widgets definitions registered in the current engine.
     *
     * @return array Widgets definitions
     */
    public function getWidgetDefinitions(): array
    {
        return $this->widgetDefinitionRegistry->getWidgetsDefinitions();
    }

     /**
     * 
     *
     * @return array Widgets definitions
     */
    public function getWidgetDefinition($rootValue, array $args): ?WidgetDefinitionInterface
    {
        return $this->widgetDefinitionRegistry->getWidgetDefinition($args['id']);
    }
}