<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Definition\Registry;

use Legobuilder\Framework\Zone\Definition\ZoneDefinitionInterface;
use Legobuilder\Framework\Zone\Zone;
use Legobuilder\Framework\Zone\ZoneInterface;

interface ZoneDefinitionRegistryInterface
{
    /**
     * Returns a Zone by identifier.
     *
     * @param  string $zoneIdentifier The identifier of the zone to retrieve.
     * @return ZoneDefinitionInterface The zone definition object that matches the provided zoneIdentifier.
     * @throws Exception\InvalidArgumentException if the zone cannot be retrieved
     */
    public function getZoneDefinition(string $zoneIdentifier): ZoneDefinitionInterface;

    /**
     * Returns whether the given zone identifier is registered.
     */
    public function hasZoneDefinition(string $zoneIdentifier): bool;

    /**
     * Get Zone registered.
     *
     * @return array
     */
    public function getZoneDefinitions(): array;

    /**
     * Register a new zone.
     *
     * @param Zone $zone
     */
    public function registerZoneDefinition(ZoneDefinitionInterface $zoneDefinition): self;
}
