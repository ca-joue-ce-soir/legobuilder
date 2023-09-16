<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Resolver\ControlResolver;
use Legobuilder\Framework\Endpoint\Resolver\WidgetResolver;
use Legobuilder\Framework\Endpoint\Resolver\ZoneDefinitionResolver;
use Legobuilder\Framework\Endpoint\Resolver\ZoneResolver;

final class QueryType extends ObjectType
{
    public function __construct(
        TypeLoaderInterface $typeLoader,
        ZoneDefinitionResolver $zoneDefinitionResolver,
        WidgetResolver $widgetResolver,
        ControlResolver $controlResolver
    ) {
        parent::__construct(
            [
                'name' => 'Query',
                'fields' => [
                    'zoneDefinitions' => [
                        'type' => Type::listOf($typeLoader->get(ZoneDefinitionType::class)),
                        'description' => 'Get all the zones definition in the engine.',
                        'resolve' => [$zoneDefinitionResolver, 'getZoneDefinitions'],
                    ],
                ],
            ]
        );
    }
}
