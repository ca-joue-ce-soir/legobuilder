<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\Endpoint\Transformer\ZoneDefinitionTransformer;
use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistryInterface;

class ZoneDefinitionResolver
{
    /**
     * @var ZoneDefinitionRegistryInterface
     */
    private $zoneDefinitionRegistry;

    /**
     * @var ZoneDefinitionTransformer
     */
    private $zoneDefinitionTransformer;

    public function __construct(
        ZoneDefinitionRegistryInterface $zoneDefinitionRegistry
    ) {
        $this->zoneDefinitionRegistry = $zoneDefinitionRegistry;
        $this->zoneDefinitionTransformer = new ZoneDefinitionTransformer();
    }

    /**
     * Retrieve all the zone definitions saved for the engine and format them 
     * correctly to match the GraphQL type.
     *
     * @return array The registered zone definitions
     */
    public function getZoneDefinitions(): array
    {
        $zoneDefinitions = $this->zoneDefinitionRegistry->getZoneDefinitions();

        return array_map(function($zoneDefinition) {
            return $this->zoneDefinitionTransformer->transform($zoneDefinition);
        }, $zoneDefinitions);
    }
    
    /**
     * Retrieve a specific zone definition identified by the given identifier 
     * and format it to match the GraphQL type.
     *
     * @param string $zoneDefinitionIdentifier The identifier of the zone definition
     * @return array The formatted zone definition
     */
    public function getZoneDefinition(string $zoneDefinitionIdentifier): array
    {
        $zoneDefinition = $this->zoneDefinitionRegistry->getZoneDefinition($zoneDefinitionIdentifier);
        return $this->zoneDefinitionTransformer->transform($zoneDefinition);
    }
}
