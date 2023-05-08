<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone;

interface ZoneDynamicInterface extends ZoneInterface
{
    public function getDynamicProperties(): array;
}
