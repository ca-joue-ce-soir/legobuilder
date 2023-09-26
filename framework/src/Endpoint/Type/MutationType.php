<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Mutator\ZoneMutator;

final class MutationType extends ObjectType
{
    public function __construct(
        TypeLoaderInterface $typeLoader,
        ZoneMutator $zoneMutator
    ) {
        parent::__construct(
            [
                'name'   => 'Mutation',
                'fields' => [
                    'updateZone' => [
                        'type' => $typeLoader->getByClassName(ZoneType::class),
                        'args' => [
                            'id' => Type::nonNull(Type::string()),
                            'parameters' => Type::string(),
                            'widgets' => Type::nonNull(Type::string())
                        ],
                        'resolve' => [$zoneMutator, 'updateData']
                    ]
                ],
            ]
        );
    }
}
