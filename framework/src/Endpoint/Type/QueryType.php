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
                        'type' => Type::listOf($typeLoader->get(ZoneDefinitionType::class)),
                        'description' => 'Get all the zones definition in the engine.',
                        'resolve' => [$zoneDefinitionResolver, 'getZoneDefinitions'],
                    ],
                ],
            ]
        );
    }
}
