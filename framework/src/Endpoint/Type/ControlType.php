<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Engine\Control\ControlInterface;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Type\Scalar\JsonType;

final class ControlType extends ObjectType
{
    public function __construct(TypeLoaderInterface $typeLoader)
    {
        parent::__construct(
            [
                'name' => 'Control',
                'description' => 'Controls are properties that users can modify to configure a widget.',
                'fields' => [
                    'id' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (ControlInterface $control) {
                            return $control->getId();
                        }
                    ],
                    'type' => [
                        'type' => Type::nonNull(Type::string()),
                        'description' => 'Type of the control (color, text, number, etc...)',
                        'resolve' => function (ControlInterface $control) {
                            return $control->getType();
                        }
                    ],
                    'options' => [
                        'type' => $typeLoader->getByClassName(JsonType::class),
                        'resolve' => function (ControlInterface $control) {
                            return $control->getOptions();
                        }
                    ],
                    'class' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (ControlInterface $control) {
                            return get_class($control);
                        }
                    ]
                ],
            ]
        );
    }
}
