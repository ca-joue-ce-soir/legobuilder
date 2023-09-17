<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;

final class ZoneType extends ObjectType
{
    public function __construct(TypeLoaderInterface $typeLoader)
    {
        parent::__construct(
            [
                'fields' => [
                    'definition' => [
                        'type' => Type::nonNull($typeLoader->getByClassName(ZoneDefinitionType::class)),
                    ],
                    'parameters' => [
                        'type' => Type::listOf(Type::string())
                    ],
                    'widgets' => [
                        'type' => Type::listOf($typeLoader->getByClassName(WidgetType::class))
                    ]
                ]
            ]
        ); 
    }
}