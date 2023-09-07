<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone;

use Legobuilder\Framework\Renderer\RendererInterface;

interface ZoneInterface
{
    public function render(RendererInterface $renderer): string;
}
