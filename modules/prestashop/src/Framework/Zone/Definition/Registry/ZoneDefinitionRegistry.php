<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Definition\Registry;

use Legobuilder\Framework\Zone\Zone;

class ZoneDefinitionRegistry implements ZoneDefinitionRegistryInterface
{
    /**
     * @var Zone[]
     */
    private $registeredZones;

    /**
     * ZoneDefinitionRegistry constructor.
     */
    public function __construct()
    {
        $this->registeredZones = [];
    }

    /**
     * Get all registered zones.
     *
     * @return array
     */
    public function getZones(): array
    {
        return $this->registeredZones;
    }

    /**
     * Get a specific zone by identifier.
     *
     * @param string $zoneIdentifier
     * @return Zone
     */
    public function getZone(string $zoneIdentifier): Zone
    {
        return $this->registeredZones[$zoneIdentifier];
    }

    /**
     * Check if a zone exists.
     *
     * @param string $zoneIdentifier
     * @return bool
     */
    public function hasZone(string $zoneIdentifier): bool
    {
        return isset($this->registeredZones[$zoneIdentifier]);
    }

    /**
     * Register a new zone.
     *
     * @param Zone $zone
     * @return ZoneDefinitionRegistry
     */
    public function registerZone(Zone $zone): ZoneDefinitionRegistry
    {
        $this->registeredZones[$zone->getIdentifier()] = $zone;

        return $this;
    }
}
