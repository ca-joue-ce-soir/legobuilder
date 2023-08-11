<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Renderer;

use Legobuilder\Framework\Widget\WidgetInterface;
use Legobuilder\Framework\Zone\Zone;

interface RendererInterface
{
    /**
     * Render a specific Widget with their data based on the
     * current engine (mostly based on the Templating engine).
     *
     * @param WidgetInterface $Widget
     * @return string Rendered Widget
     */
    public function renderWidget(WidgetInterface $Widget): string;

    /**
     * Render a specific zone.
     *
     * @param Zone $zone
     * @return string Rendered zone
     */
    public function renderZone(Zone $zone): string;
}
