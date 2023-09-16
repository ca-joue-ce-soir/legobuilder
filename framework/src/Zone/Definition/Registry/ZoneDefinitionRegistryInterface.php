<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Definition\Registry;

use Legobuilder\Framework\Zone\Definition\ZoneDefinition;
use Legobuilder\Framework\Zone\Definition\ZoneDefinitionInterface;

interface ZoneDefinitionRegistryInterface
{
    /**
     * Returns a Zone by identifier.
     *
     * @param  string $zoneIdentifier The identifier of the zone to retrieve.
     * @return ZoneDefinitionInterface The zone definition object that matches the provided zoneIdentifier.
     */
    public function getZoneDefinition(string $zoneIdentifier): ZoneDefinitionInterface;

    /**
     * Returns whether the given zone identifier is registered.
     */
    public function hasZoneDefinition(string $zoneIdentifier): bool;

    /**
     * Get Zone registered.
     *
     * @return ZoneDefinitionInterface[]
     */
    public function getZoneDefinitions(): array;

    /**
     * Register a new zone.
     *
     * @param ZoneDefinitionInterface $zoneDefinition
     */
    public function registerZoneDefinition(ZoneDefinitionInterface $zoneDefinition): self;
}
