<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Resolver\ZoneDefinitionResolver;

final class QueryType extends ObjectType
{
    public function __construct(
        TypeLoaderInterface $typeLoader,
        ZoneDefinitionResolver $zoneDefinitionResolver
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
                    ],
                    'widget' => [
                        'type' => $typeLoader->getByClassName(WidgetType::class),
                        'args' => [
                            'id' => [
                                'type' => Type::id()
                            ]
                        ],
                    ]
                ],
            ]
        );
    }
}
