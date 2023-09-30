<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Type\Scalar\JsonType;
use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;

final class WidgetDefinitionControlType extends ObjectType
{
    public function __construct(TypeLoaderInterface $typeLoader)
    {
        parent::__construct(
            [
                'name' => 'WidgetDefinitionControl',
                'description' => '',
                'fields' => [
                    'id' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (WidgetDefinitionInterface $widgetDefinition) {
                            return $widgetDefinition->getId();
                        }
                    ],
                    'options' => [
                        'type' => $typeLoader->getByClassName(JsonType::class),
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
