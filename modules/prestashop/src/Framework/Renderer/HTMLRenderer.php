<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Renderer;

use Legobuilder\Framework\Widget\WidgetInterface;
use Legobuilder\Framework\Zone\Zone;

class HTMLRenderer implements RendererInterface
{
    /**
     * Render a simple file and returns the content of it.
     * 
     * @param WidgetInterface $widget
     * @return string Rendered widget
     */
    public function renderWidget(WidgetInterface $widget): string
    {
        $widgetDefinition = $widget->getDefinition();
        $templatePath = $widgetDefinition->getTemplatePath();

        ob_start();
        require_once $templatePath;
        return ob_get_flush();
    }
    
    /**
     * Render an empty zone : used by the editor to display area that users
     * can add widgets or modify existing ones.
     * 
     * @param Zone $zone
     * @return string Rendered zone
     */
    public function renderZone(Zone $zone): string
    {
        return '<div class="zone"></div>';
    }
}
