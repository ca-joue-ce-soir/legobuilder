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

    public function renderWidget(WidgetInterface $Widget): string
    {
        $templatePath = $Widget->getDefinition()->getTemplatePath();

        return $this->smarty->fetch($templatePath);
    }

    public function renderZone(ZoneInterface $zone): string
    {
        return $this->smarty->fetch(_PS_MODULE_DIR_ . 'legobuilder/views/templates/front/zone.tpl');
    }
}