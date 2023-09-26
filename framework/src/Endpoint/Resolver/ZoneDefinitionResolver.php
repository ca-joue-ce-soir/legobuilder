<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\Endpoint\Transformer\ZoneDefinitionTransformer;
use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistryInterface;
use Legobuilder\Framework\Zone\Definition\ZoneDefinitionInterface;

class ZoneDefinitionResolver
{
    /**
     * @var ZoneDefinitionRegistryInterface
     */
    private $zoneDefinitionRegistry;

    public function __construct(ZoneDefinitionRegistryInterface $zoneDefinitionRegistry) 
    {
        $this->zoneDefinitionRegistry = $zoneDefinitionRegistry;
    }

    /**
     * Retrieve all the zone definitions saved for the engine and format them 
     * correctly to match the GraphQL type.
     *
     * @return array The registered zone definitions
     */
    public function getZoneDefinitions(): array
    {
        return $this->zoneDefinitionRegistry->getZoneDefinitions();
    }
    
    /**
     * Retrieve a specific zone definition identified by the given identifier 
     * and format it to match the GraphQL type.
     *
     * @param $rootValue
     * @param array $args
     * 
     * @return ?ZoneDefinitionInterface The formatted zone definition
     */
    public function getZoneDefinition($rootValue, array $args): ?ZoneDefinitionInterface
    {
        return $this->zoneDefinitionRegistry->getZoneDefinition($args['id']);
    }
}
