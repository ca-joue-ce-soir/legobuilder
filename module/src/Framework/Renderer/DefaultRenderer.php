<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Renderer;

use Legobuilder\Framework\Widget\WidgetInterface;
use Legobuilder\Framework\Zone\ZoneInterface;

class DefaultRenderer implements RendererInterface
{
    public function renderWidget(WidgetInterface $Widget): string
    {
        $templatePath = $Widget->getDefinition()->getTemplatePath();

        ob_start();
        require_once $templatePath;
        return ob_get_flush();
    }

    public function renderZone(ZoneInterface $zone): string
    {
        return '<div class="zone"></div>';
    }
}
