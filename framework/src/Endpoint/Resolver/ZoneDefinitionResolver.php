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
        ZoneDefinitionRegistryInterface $zoneDefinitionRegistry,
        ZoneDefinitionTransformer $zoneDefinitionTransformer
    ) {
        $this->zoneDefinitionRegistry = $zoneDefinitionRegistry;
        $this->zoneDefinitionTransformer = $zoneDefinitionTransformer;
    }

    /**
     * Retrieve all the zones definitions saved for the engine and
     * formats them correctly to match the GraphQL type.
     *
     * @return array Registered zones
     */
    public function getZoneDefinitions(): array
    {
        $zoneDefinitions = $this->zoneDefinitionRegistry->getZoneDefinitions();

        return array_map(function($zoneDefinition) {
            return $this->zoneDefinitionTransformer->transform($zoneDefinition);
        }, $zoneDefinitions);
    }
    
    public function getZoneDefinition(string $zoneDefinitionIdentifier): array
    {
        $zoneDefinition = $this->zoneDefinitionRegistry->getZoneDefinition($zoneDefinitionIdentifier);
        return (array) $this->zoneDefinitionTransformer->transform($zoneDefinition);
    }
}
