<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Renderer;

use Legobuilder\Framework\Widget\WidgetInterface;
use Legobuilder\Framework\Zone\ZoneInterface;

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
     * @param ZoneInterface $zone
     * @return string Rendered zone
     */
    public function renderZone(ZoneInterface $zone): string;
}
