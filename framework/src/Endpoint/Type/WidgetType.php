<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;

final class WidgetType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Widget',
            'description' => 'Widget data that are saved in specific zone',
            'fields' => [
                ''
            ]
        ]);
    }
}
