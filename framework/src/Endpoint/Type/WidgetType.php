<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;

final class WidgetType extends ObjectType
{
    public function __construct(TypeLoaderInterface $typeLoader)
    {
        parent::__construct(
            [
                'name' => 'Widget',
                'description' => 'Widget that are saved in specific zone',
                'fields' => [
                    'definition' => [
                        'type' => Type::nonNull($typeLoader->get(WidgetDefinitionType::class)),
                    ],
                    'zone' => [
                        'type' => Type::nonNull(Type::string()),
                    ],
                ],
            ]
        );
    }
}
