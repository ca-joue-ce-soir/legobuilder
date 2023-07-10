<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Registry;

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
     * @param ZoneInterface $zone
     */
    public function registerzone(ZoneInterface $zone): self
    {
        $this->registeredZones[get_class($zone)] = $zone;

        return $this;
    }
}
