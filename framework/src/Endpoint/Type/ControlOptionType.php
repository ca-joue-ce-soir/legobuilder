<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Control\ControlInterface;
use Legobuilder\Framework\Control\Option\ControlOptionInterface;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Type\Scalar\JsonType;

final class ControlOptionType extends ObjectType
{
    public function __construct(TypeLoaderInterface $typeLoader)
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
                    ]
                ],
            ]
        );
    }
}
