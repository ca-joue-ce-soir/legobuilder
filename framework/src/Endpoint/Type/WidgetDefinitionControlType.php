<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Type\Scalar\JsonType;
use Legobuilder\Framework\Widget\Definition\Control\WidgetDefinitionControl;
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
                        'resolve' => function (WidgetDefinitionControl $widgetDefinitionControl) {
                            return $widgetDefinitionControl->getId();
                        }
                    ],
                    'control' => [
                        'type' => $typeLoader->getByClassName(ControlType::class),
                        'resolve' => function (WidgetDefinitionControl $widgetDefinitionControl) {
                            return  $widgetDefinitionControl->getControl();
                        }
                    ],
                    'options' => [
                        'type' => $typeLoader->getByClassName(JsonType::class),
                        'resolve' => function (WidgetDefinitionControl $widgetDefinitionControl) {
                            return $widgetDefinitionControl->getOptions();
                        }
                    ]
                ],
            ]
        );
    }
}
