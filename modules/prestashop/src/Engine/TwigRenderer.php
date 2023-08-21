<?php

namespace Legobuilder\Engine;

use Legobuilder\Framework\Renderer\RendererInterface;

final class TwigRenderer implements RendererInterface
{
    /**
     * @var Twig
     */
    private $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
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
        return '';
    }
}