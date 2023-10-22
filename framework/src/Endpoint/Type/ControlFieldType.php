<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Type\Scalar\JsonType;
use Legobuilder\Framework\Control\Field\ControlFieldInterface;

final class ControlFieldType extends ObjectType
{
    public function __construct(TypeLoaderInterface $typeLoader)
    {
        parent::__construct(
            [
                'name' => 'ControlField',
                'description' => 'Controls fields are properties that users can modify to configure a widget.',
                'fields' => [
                    'id' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (ControlFieldInterface $controlField) {
                            return $controlField->getId();
                        }
                    ],
                    'type' => [
                        'type' => Type::nonNull(Type::string()),
                        'description' => 'Type of the control (color, text, number, etc...)',
                        'resolve' => function (ControlFieldInterface $controlField) {
                            return $controlField->getType();
                        }
                    ],
                    'options' => [
                        'type' => $typeLoader->getByClassName(JsonType::class),
                        'resolve' => function (ControlFieldInterface $controlField) {
                            return $controlField->getOptions();
                        }
                    ],
                    'class' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (ControlFieldInterface $controlField) {
                            return get_class($controlField);
                        }
                    ]
                ],
            ]
        );
    }
}
