<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Resolver\ControlResolver;
use Legobuilder\Framework\Endpoint\Resolver\WidgetResolver;
use Legobuilder\Framework\Endpoint\Resolver\ZoneResolver;

final class QueryType extends ObjectType
{
    public function __construct(
        ZoneResolver $zoneResolver, 
        WidgetResolver $widgetResolver, 
        ControlResolver $controlResolver)
    {
        parent::__construct([
            'name' => 'Query',
            'fields' => [
                'zones' => [
                    'type' => Type::listOf(ZoneType::type()),
                    'description' => 'Get all the zones registered in the engine',
                    'resolve' => [$zoneResolver, 'getRegisteredZones']
                ],
                'widgets' => [
                    'type' => Type::listOf(WidgetType::type()),
                    'description' => '',
                    'resolve' => [$widgetResolver, 'getRegisteredWidgets']
                ],
                'widget' => [
                    'type' => WidgetType::type(),
                    'description' => 'Retrieves information about a specific widget',
                    'args' => [
                        'id' => [
                            'type' => Type::id()
                        ]
                    ],
                    'resolve' => [$widgetResolver, 'getRegisteredWidget']
                ],
                'controls' =>  [
                    'type' => Type::listOf(ControlType::type()),
                    'description' => '',
                    'resolve' => [$controlResolver, 'getRegisteredControls']
                ]
            ]
        ]);
    }
}
