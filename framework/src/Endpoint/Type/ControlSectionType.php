<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Control\Section\ControlSectionInterface;

final class ControlSectionType extends ObjectType
{
    public function __construct(TypeLoaderInterface $typeLoader)
    {
        parent::__construct(
            [
                'name' => 'ControlSection',
                'fields' => [
                    'id' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (ControlSectionInterface $controlSection) {
                            return $controlSection->getId();
                        }
                    ],
                    'label' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (ControlSectionInterface $controlSection) {
                            return $controlSection->getLabel();
                        }
                    ],
                    'icon' => [
                        'type' => Type::string(),
                        'resolve' => function (ControlSectionInterface $controlSection) {
                            return $controlSection->getIcon();
                        }
                    ],
                    'groups' => [
                        'type' => Type::listOf($typeLoader->getByClassName(ControlGroupType::class)),
                        'resolve' => function (ControlSectionInterface $controlSection) {
                            return $controlSection->getGroups();
                        }
                    ]
                ],
            ]
        );
    }
}
