<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Zone\Renderer\ZoneRendererInterface;
use Legobuilder\Framework\Zone\ZoneInterface;

final class ZoneType extends ObjectType
{
    public function __construct(
        TypeLoaderInterface $typeLoader,
        ZoneRendererInterface $zoneRenderer
    ) {
        parent::__construct(
            [
                'fields' => [
                    'definition' => [
                        'type' => Type::nonNull($typeLoader->getByClassName(ZoneDefinitionType::class)),
                        'resolve' => function (ZoneInterface $zone) {
                            return $zone->getDefinition();
                        }
                    ],
                    'parameters' => [
                        'type' => Type::listOf(Type::string()),
                        'resolve' => function (ZoneInterface $zone) {
                            return $zone->getParameters();
                        }
                    ],
                    'widgets' => [
                        'type' => Type::listOf($typeLoader->getByClassName(WidgetType::class)),
                        'resolve' => function (ZoneInterface $zone) {
                            return $zone->getWidgets();
                        }
                    ],
                    'render' => [
                        'type' => Type::nonNull(Type::string()),
                        'resolve' => function(ZoneInterface $zone) use ($zoneRenderer) {
                            return $zoneRenderer->render($zone);
                        }
                    ]
                ]
            ]
        ); 
    }
}