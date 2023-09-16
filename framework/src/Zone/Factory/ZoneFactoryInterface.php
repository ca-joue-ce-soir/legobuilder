<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Factory;

use Legobuilder\Framework\Zone\ZoneInterface;

interface ZoneFactoryInterface
{
    /**
     * Get a zone by its identifier.
     *
     * @param  string $zoneIdentifier
     * @return Zone
     */
    public function getZone(string $zoneIdentifier): ZoneInterface;
}
