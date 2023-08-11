<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Registry;

use Legobuilder\Framework\Zone\Zone;

class ZoneRegistry implements ZoneRegistryInterface
{
    /**
     * @var array
     */
    private $registeredZones;

    public function __construct()
    {
        $this->registeredZones = [];
    }

    /**
     * Get Widgets registered.
     *
     * @return array
     */
    public function getRegisteredZones(): array
    {
        return $this->registeredZones;
    }

    /**
     * Register a new zone.
     * 
     * @param Zone $zone
     */
    public function registerzone(Zone $zone): self
    {
        $this->registeredZones[$zone->getIdentifier()] = $zone;

        return $this;
    }
}
