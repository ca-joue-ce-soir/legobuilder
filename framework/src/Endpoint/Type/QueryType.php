<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

final class QueryType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Query',
            'fields' => [
                'controls' => [
                    'type' => Type::listOf(ControlType::class),
                    'description' => 'Retrieve the set of defined controls',
                    'resolve' => function(): array {
                        return [];
                    }
                ],
                'widgets' => [
                    'type' => Type::listOf(WidgetType::class),
                    'description' => ''
                ]
            ]
        ]);
    }
}
