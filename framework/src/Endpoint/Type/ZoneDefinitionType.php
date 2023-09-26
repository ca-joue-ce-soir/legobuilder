<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Zone\Definition\ZoneDefinitionInterface;

final class ZoneDefinitionType extends ObjectType
{
    public function __construct()
    {
        parent::__construct(
            [
                'fields' => [
                    'id' => [
                        'type' => Type::nonNull(Type::string()),
                        'description' => 'Unique identifier of the zone',
                        'resolve' => function (ZoneDefinitionInterface $zoneDefinition) {
                            return $zoneDefinition->getIdentifier();
                        }
                    ],
                    'parameters' => [
                        'type' => Type::string(),
                        'description' => '',
                        'resolve' => function (ZoneDefinitionInterface $zoneDefinition) {
                            return $zoneDefinition->getParameters();
                        }
                    ]
                ],
            ]
        );
    }
}
