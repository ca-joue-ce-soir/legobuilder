<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\Zone\Registry\ZoneRegistryInterface;

class ZoneResolver
{
    /**
     * @var ZoneRegistryInterface 
     */
    private $zoneRegistry;

    public function __construct(ZoneRegistryInterface $zoneRegistry)
    {
        $this->zoneRegistry = $zoneRegistry;
    }

    /**
     * Retrieve all the zones saved for the current engine and 
     * formats them correctly to match the GraphQL type.
     * 
     * @return array Registered zones
     */
    public function getRegisteredZones(): array
    {
        $registeredZones = $this->zoneRegistry->getRegisteredZones();
        $registeredZonesFormatted = [];

        foreach ($registeredZones as $zone) {
            $registeredZonesFormatted[] =  [
                'id' => $zone->getIdentifier()
            ];
        }

        return $registeredZonesFormatted;
    }
}