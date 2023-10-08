<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Engine\Control\Option\ControlOptionInterface;

final class ControlOptionType extends ObjectType
{
    public function __construct()
    {
        parent::__construct(
            [
                'name' => 'ControlOption',
                'description' => 'Controls are properties that users can modify to configure a widget.',
                'fields' => [
                    'id' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (ControlOptionInterface $controlOption) {
                            return $controlOption->getIdentifier();
                        }
                    ],
                    'required' => [
                        'type' => Type::boolean(),
                        'resolve' => function (ControlOptionInterface $controlOption) {
                            return $controlOption->isRequired();
                        }
                    ],
                    'constraints' => [
                        'type' => Type::listOf(Type::string()),
                        'resolve' => function (ControlOptionInterface $controlOption) {
                            return array_map('get_class', $controlOption->getConstraints());
                        }
                    ]
                ],
            ]
        );
    }
}
