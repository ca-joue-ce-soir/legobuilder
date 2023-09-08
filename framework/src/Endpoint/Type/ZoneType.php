<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

final class ZoneType extends ObjectType
{
    public function __construct()
    {
        parent::__construct(
            [
                'name'        => 'Zone',
                'description' => 'Zones are sections that can be modified from the editor and can be dynamic (linked to properties such as a page identifier).',
                'fields'      => [
                    'id' => [
                        'type'        => Type::nonNull(Type::string()),
                        'description' => 'Unique identifier of the zone',
                    ],
                ],
            ]
        );
    }

    public static function type()
    {
        return new ZoneType();
    }
}
