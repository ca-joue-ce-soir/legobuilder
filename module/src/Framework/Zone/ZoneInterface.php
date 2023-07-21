<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone;

interface ZoneInterface
{
    /**
     * Get Zone Identifier
     */
    public function getZoneIdentifier(): string;
}
