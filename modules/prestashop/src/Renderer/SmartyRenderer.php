<?php

namespace Legobuilder\Renderer;

use Legobuilder\Framework\Renderer\RendererInterface;
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
     * Render a template with parameters.
     *
     * @param string $templatePath
     * @param array $parameters
     * 
     * @return string Rendered Widget
     */
    public function view(string $templatePath, array $parameters = []): string
    {
        $this->smarty->assign($parameters);
        return $this->smarty->fetch($templatePath);
    }
}