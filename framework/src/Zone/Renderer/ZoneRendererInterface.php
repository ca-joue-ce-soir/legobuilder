<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Renderer;

use Legobuilder\Framework\Zone\ZoneInterface;

interface ZoneRendererInterface
{
    public function render(ZoneInterface $zone): string;
}
