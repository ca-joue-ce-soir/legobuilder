<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;

final class WidgetDefinitionType extends ObjectType
{
    public function __construct(TypeLoaderInterface $typeLoader)
    {
        parent::__construct(
            [
                'name' => 'WidgetDefinition',
                'description' => 'Widget Definition is the set of possible widgets to be created by the user.',
                'fields' => [
                    'id' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (WidgetDefinitionInterface $widgetDefinition) {
                            return $widgetDefinition->getId();
                        }
                    ],
                    'name' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (WidgetDefinitionInterface $widgetDefinition) {
                            return $widgetDefinition->getName();
                        }
                    ],
                    'controls' => [
                        'type' => Type::listOf($typeLoader->getByClassName(ControlType::class)),
                        'resolve' => function (WidgetDefinitionInterface $widgetDefinition) {
                            return $widgetDefinition->getControls();
                        }
                    ],
                ],
            ]
        );
    }
}
