<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Resolver\ControlResolver;
use Legobuilder\Framework\Endpoint\Resolver\WidgetDefinitionResolver;
use Legobuilder\Framework\Endpoint\Resolver\WidgetResolver;
use Legobuilder\Framework\Endpoint\Resolver\ZoneDefinitionResolver;
use Legobuilder\Framework\Endpoint\Resolver\ZoneResolver;

final class QueryType extends ObjectType
{
    public function __construct(
        TypeLoaderInterface $typeLoader,
        ZoneDefinitionResolver $zoneDefinitionResolver,
        WidgetDefinitionResolver $widgetDefinitionResolver,
        ZoneResolver $zoneResolver,
        ControlResolver $controlResolver,
        WidgetResolver $widgetResolver
    ) {
        parent::__construct(
            [
                'name' => 'Query',
                'fields' => [
                    'zoneDefinitions' => [
                        'type' => Type::listOf($typeLoader->getByClassName(ZoneDefinitionType::class)),
                        'description' => 'Get all the zones definition in the engine.',
                        'resolve' => [$zoneDefinitionResolver, 'getZoneDefinitions'],
                    ],
                    'zoneDefinition' => [
                        'type' => $typeLoader->getByClassName(ZoneDefinitionType::class),
                        'description' => 'Get a zone definition based on the id.',
                        'args' => [
                            'id' => [
                                'type' => Type::id()
                            ]
                        ],
                        'resolve' => [$zoneDefinitionResolver, 'getZoneDefinition']
                    ],
                    'zone' => [
                        'type' => $typeLoader->getByClassName(ZoneType::class),
                        'args' => [
                            'id' => [
                                'type' => Type::id()
                            ]
                        ],
                        'resolve' => [$zoneResolver, 'getZone']
                    ],
                    'controls' => [
                        'type' => Type::listOf($typeLoader->getByClassName(ControlType::class)),
                        'description' => 'Get all controls registered in the engine.',
                        'resolve' => [$controlResolver, 'getControls']
                    ],
                    'control' => [
                        'type' => $typeLoader->getByClassName(ControlType::class),
                        'args' => [
                            'id' => [
                                'type' => Type::id()
                            ]
                        ],
                        'resolve' => [$controlResolver, 'getControl']
                    ],
                    'widgetDefinitions' => [
                        'type' => Type::listOf($typeLoader->getByClassName(WidgetDefinitionType::class)),
                        'description' => '',
                        'resolve' => [$widgetDefinitionResolver, 'getWidgetDefinitions']
                    ],
                    'widgetDefinition' => [
                        'type' => $typeLoader->getByClassName(WidgetDefinitionType::class),
                        'description' => 'Get a widget definition based on the id.',
                        'args' => [
                            'id' => [
                                'type' => Type::id()
                            ]
                        ],
                        'resolve' => [$widgetDefinitionResolver, 'getWidgetDefinition']
                    ],
                    'widget' => [
                        'type' => $typeLoader->getByClassName(WidgetType::class),
                        'args' => [
                            'id' => [
                                'type' => Type::id()
                            ]
                        ],
                        'resolve' => [$widgetResolver, 'getWidget']
                    ]
                ],
            ]
        );
    }
}
