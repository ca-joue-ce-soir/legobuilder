<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

final class WidgetType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Widget',
            'description' => 'Widget that are saved in specific zone',
            'fields' => [
                'definition' => [
                    'type' => Type::nonNull(WidgetDefinitionType::class)
                ],
                'data' => [
                    'type' => Type::string()
                ],
                'zone' =>  [
                    'type' => Type::nonNull(Type::string())
                ]
            ]
        ]);
    }
}
