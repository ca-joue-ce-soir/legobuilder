<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Renderer;

use Legobuilder\Framework\Zone\Renderer\ZoneRendererInterface;
use Legobuilder\Framework\Zone\ZoneInterface;

final class ZoneRender implements ZoneRendererInterface
{
    /**
     * Renders a zone by iterating over its widgets and calling their
     * render method with the provided renderer.
     *
     * @return string The rendered zone.
     */
    public function render(ZoneInterface $zone): string
    {
        $renderOutput = '';

        foreach ($zone->getWidgets() as $widget) {
            $renderOutput .= $widget->getDefinition()->render($widget);
        }

        return $renderOutput;
    }
}
