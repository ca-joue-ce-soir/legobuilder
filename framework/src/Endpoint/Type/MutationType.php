<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;

final class MutationType extends ObjectType
{
    public function __construct()
    {
        parent::__construct(
            [
            'name' => 'Mutation',
            'fields' => [
                
            ]
            ]
        );
    }
}
