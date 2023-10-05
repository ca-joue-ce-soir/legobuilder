<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Type\Scalar\JsonType;
use Legobuilder\Framework\Widget\WidgetInterface;

final class WidgetType extends ObjectType
{
    public function __construct(TypeLoaderInterface $typeLoader) 
    {
        parent::__construct(
            [
                'description' => 'Widget that are saved in specific zone',
                'fields' => [
                    'definition' => [
                        'type' => Type::nonNull($typeLoader->getByClassName(WidgetDefinitionType::class)),
                        'resolve' => function (WidgetInterface $widget) {
                            return $widget->getDefinition();
                        }
                    ],
                    'zone' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (WidgetInterface $widget) {
                            return $widget->getZoneIdentifier();
                        }
                    ],
                    'settings' => [
                        'type' => $typeLoader->getByClassName(JsonType::class),
                        'resolve' => function (WidgetInterface $widget) {
                            return [
                                'control_0' => 'Coucoucouuu',
                                'control_1' => 'Hello',
                                'control_2' => 'World'
                            ];
                        }
                    ],
                    'render' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function (WidgetInterface $widget) {
                            return $widget->getDefinition()->render($widget);
                        }
                    ]
                ],
            ]
        );
    }
}
