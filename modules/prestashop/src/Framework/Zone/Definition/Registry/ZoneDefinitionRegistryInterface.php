<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Definition\Registry;

use Legobuilder\Framework\Zone\Zone;

interface ZoneDefinitionRegistryInterface
{
    /**
     * Returns a Zone by identifier.
     *
     * @throws Exception\InvalidArgumentException if the zone cannot be retrieved
     */
    public function getZone(string $zoneIdentifier): Zone;

    /**
     * Returns whether the given zone identifier is registered.
     */
    public function hasZone(string $zoneIdentifier): bool;

    /**
     * Get Zone registered.
     *
     * @return array
     */
    public function getZones(): array;

    /**
     * Register a new zone.
     * 
     * @param Zone $zone
     */
    public function registerZone(Zone $zone): self;
}
