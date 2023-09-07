<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;

class WidgetResolver
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
     * Retrieve all the widgets saved for the current engine and 
     * formats them correctly to match the GraphQL type.
     * 
     * @return array Registered widegets
     */
    public function getRegisteredWidgets(): array
    {
        return [];
    }

    public function getRegisteredWidget($rootValue, array $args): array
    {
        return [
            'definition' => 'de',
            'data' => 'da',
            'zone' => 'z'
        ];
    }

    /**
     * Retrieve all the widgetsdefinitions registered in the current engine and 
     * formats them correctly to match the GraphQL type.
     * 
     * @return array Registered widgets definitions
     */
    public function getRegisteredWidgetsDefinitions(): array
    {
        $registeredWidgetsDefinitions = $this->widgetDefinitionRegistry->getRegisteredWidgetsDefinitions();
        $registeredWidgetsDefinitionsFormatted = [];

        foreach ($registeredWidgetsDefinitions as $widgetDefinition) {
            $registeredWidgetsDefinitionsFormatted[] = [
                'id' => $widgetDefinition->getId(),
                'name' => $widgetDefinition->getName(),
                'template_path' => $widgetDefinition->getTemplatePath()
            ];
        }

        return $registeredWidgetsDefinitionsFormatted;
    }
}
