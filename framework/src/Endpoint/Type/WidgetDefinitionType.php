<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

final class WidgetDefinitionType extends ObjectType
{
    public function __construct()
    {
        parent::__construct(
            [
                'name' => 'WidgetDefinition',
                'description' => 'Widget Definition is the set of possible widgets to be created by the user.',
                'fields' => [
                    'id' => [
                        'type' => Type::nonNull(Type::string()),
                    ],
                    'name' => [
                        'type' => Type::nonNull(Type::string()),
                    ],
                    'controls' => [
                        'type' => Type::listOf(ControlType::type()),
                    ],
                ],
            ]
        );
    }
}
