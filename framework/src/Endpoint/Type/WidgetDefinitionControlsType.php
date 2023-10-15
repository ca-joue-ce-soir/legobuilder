<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Engine\WidgetDefinition\Controls\WidgetDefinitionControls;

final class WidgetDefinitionControlsType extends ObjectType
{
    public function __construct(TypeLoaderInterface $typeLoader)
    {
        parent::__construct(
            [
                'name' => 'WidgetDefinitionControls',
                'fields' => [
                    'sections' => [
                        'type' => Type::listOf($typeLoader->getByClassName(ControlSectionType::class)),
                        'resolve' => function (WidgetDefinitionControls $controls) {
                            return $controls->getSections();
                        }
                    ],
                    'groups' => [
                        'type' => Type::listOf($typeLoader->getByClassName(ControlGroupType::class)),
                        'resolve' => function (WidgetDefinitionControls $controls) {
                            return $controls->getGroups();
                        }
                    ],
                    'fields' => [
                        'type' => Type::listOf($typeLoader->getByClassName(ControlFieldType::class)),
                        'resolve' => function (WidgetDefinitionControls $controls) {
                            return $controls->getFields();
                        }
                    ]
                ],
            ]
        );
    }
}
