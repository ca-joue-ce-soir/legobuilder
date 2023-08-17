<?php

namespace Legobuilder\Engine;

use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\WidgetInterface;
use Legobuilder\Framework\Zone\Zone;
use Smarty;

final class SmartyRenderer implements RendererInterface
{
    /**
     * @var Smarty
     */
    private $smarty;

    public function __construct(Smarty $smarty)
    {
        $this->smarty = $smarty;
    }

    /**
     * Renders a widget.
     * 
     * @param WidgetInterface $widget
     * @return string Rendered widget
     */
    public function renderWidget(WidgetInterface $widget): string
    {
        $widgetDefinition = $widget->getDefinition();
        $templatePath = $widgetDefinition->getTemplatePath();

        return $this->smarty->fetch($templatePath);
    }

    /**
     * Renders an empty area on the front-office only visible from the editor.
     * 
     * @param Zone $zone
     * @return string Rendered zone
     */
    public function renderZone(Zone $zone): string
    {
        return $this->smarty->fetch('module:legobuilder/views/templates/front/zone.tpl');
    }
}