<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Engine\Zone\ZoneInterface;

final class ZoneType extends ObjectType
{
    public function __construct(TypeLoaderInterface $typeLoader)
    {
        parent::__construct(
            [
                'fields' => function () use (&$typeLoader): array {
                    return [
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
                            'resolve' => function (ZoneInterface $zone) {
                                return $zone->render();
                            }
                        ]
                    ];
                }
            ]
        );
    }
}
