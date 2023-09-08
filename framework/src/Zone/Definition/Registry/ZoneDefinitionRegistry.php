<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Definition\Registry;

use Legobuilder\Framework\Zone\Definition\ZoneDefinitionInterface;
use Legobuilder\Framework\Zone\Zone;

class ZoneDefinitionRegistry implements ZoneDefinitionRegistryInterface
{
    /**
     * @var ZoneDefinitionInterface[]
     */
    private $zoneDefinitions;

    /**
     * ZoneDefinitionRegistry constructor.
     */
    public function __construct()
    {
        $this->zoneDefinitions = [];
    }

    /**
     * Get all registered zones.
     *
     * @return array
     */
    public function getZoneDefinitions(): array
    {
        return $this->zoneDefinitions;
    }

    /**
     * Get a specific zone by identifier.
     *
     * {@inheritdoc}
     */
    public function getZoneDefinition(string $zoneIdentifier): ZoneDefinitionInterface
    {
        return $this->zoneDefinitions[$zoneIdentifier];
    }

    /**
     * Check if a zone exists.
     *
     * @param  string $zoneIdentifier
     * @return bool
     */
    public function hasZoneDefinition(string $zoneIdentifier): bool
    {
        return isset($this->zoneDefinitions[$zoneIdentifier]);
    }

    /**
     * Register a new zone.
     *
     * @param  Zone $zone
     * @return ZoneDefinitionRegistry
     */
    public function registerZoneDefinition(ZoneDefinitionInterface $zoneDefinition): ZoneDefinitionRegistry
    {
        $this->zoneDefinitions[$zoneDefinition->getIdentifier()] = $zoneDefinition;

        return $this;
    }
}
