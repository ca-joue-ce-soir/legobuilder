<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistryInterface;

class ZoneResolver
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
     * Retrieve all the zones saved for the current engine and 
     * formats them correctly to match the GraphQL type.
     * 
     * @return array Registered zones
     */
    public function getRegisteredZones(): array
    {
        $registeredZones = $this->zoneDefinitionRegistry->getZones();
        $registeredZonesFormatted = [];

        foreach ($registeredZones as $zone) {
            $registeredZonesFormatted[] =  [
                'id' => $zone->getIdentifier()
            ];
        }

        return $registeredZonesFormatted;
    }
}
