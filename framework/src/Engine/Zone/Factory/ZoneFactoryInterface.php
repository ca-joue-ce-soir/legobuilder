<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Zone\Factory;

use Legobuilder\Framework\Engine\Zone\ZoneInterface;

interface ZoneFactoryInterface
{
    /**
     * Get a zone by its identifier.
     *
     * @param  string $zoneIdentifier
     * @return ?ZoneInterface
     */
    public function getZone(string $zoneIdentifier): ?ZoneInterface;
}
