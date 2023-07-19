<?php

namespace Legobuilder\Prestashop\Engine;

use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\WidgetInterface;
use Legobuilder\Framework\Zone\ZoneInterface;
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
        $templatePath = $widget->getDefinition()->getTemplatePath();

        return $this->smarty->fetch($templatePath);
    }

    /**
     * Renders an empty area on the front-office only visible from the editor.
     * 
     * @param ZoneInterface $zone
     * @return string Rendered zone
     */
    public function renderZone(ZoneInterface $zone): string
    {
        return $this->smarty->fetch('module:legobuilder/views/templates/front/zone.tpl');
    }
}