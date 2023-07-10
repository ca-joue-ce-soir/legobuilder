<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Registry;

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
     * @param ZoneInterface $zone
     */
    public function registerZone(ZoneInterface $zone): self;
}
