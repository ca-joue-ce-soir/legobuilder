<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\WidgetDefinition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\WidgetDefinition\WidgetDefinitionInterface;

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
     * Retrieves the widget definition based on the id.
     *
     * @param mixed $rootValue The root value.
     * @param array $args The arguments.
     * @return WidgetDefinitionInterface|null The widget definition.
     */
    public function getWidgetDefinition($rootValue, array $args): ?WidgetDefinitionInterface
    {
        return $this->widgetDefinitionRegistry->getWidgetDefinition($args['id']);
    }
}
