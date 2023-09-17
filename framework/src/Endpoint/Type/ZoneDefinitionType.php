<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

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
                    ],
                    'parameters' => [
                        'type' => Type::string(),
                        'description' => ''
                    ]
                ],
            ]
        );
    }
}
