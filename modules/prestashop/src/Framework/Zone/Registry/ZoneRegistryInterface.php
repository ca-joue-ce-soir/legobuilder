<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Registry;

use Legobuilder\Framework\Zone\Zone;

interface ZoneRegistryInterface
{
    /**
     * Get Zone registered.
     *
     * @return array
     */
    public function getRegisteredZones(): array;

    /**
     * Register a new zone.
     * 
     * @param Zone $zone
     */
    public function registerZone(Zone $zone): self;
}
