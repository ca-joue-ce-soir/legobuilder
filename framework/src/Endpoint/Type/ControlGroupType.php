<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Control\Group\ControlGroupInterface;

final class ControlGroupType extends ObjectType
{
    public function __construct(TypeLoaderInterface $typeLoader)
    {
        parent::__construct(
            [
                'name' => 'ControlGroup',
                'fields' => [
                    'id' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (ControlGroupInterface $controlGroup) {
                            return $controlGroup->getId();
                        }
                    ],
                    'label' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (ControlGroupInterface $controlGroup) {
                            return $controlGroup->getLabel();
                        }
                    ],
                    'fields' => [
                        'type' => Type::listOf($typeLoader->getByClassName(ControlFieldType::class)),
                        'resolve' => function (ControlGroupInterface $controlGroup) {
                            return $controlGroup->getFields();
                        }
                    ]
                ],
            ]
        );
    }
}
