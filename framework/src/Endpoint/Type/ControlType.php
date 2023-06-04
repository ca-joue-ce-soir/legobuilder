<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

final class ControlType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Control',
            'description' => 'Controls are properties that users can modify to configure a widget.',
            'fields' => [
                'id' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'Unique identifier of the control'
                ],
                'type' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'Type of the control (color, text, number, etc...)'
                ],
                'options' => [
                    'type' => Type::string(),
                    'description' => 'Dynamic control options, represented as JSON'
                ]
            ]
        ]);
    }s
}
