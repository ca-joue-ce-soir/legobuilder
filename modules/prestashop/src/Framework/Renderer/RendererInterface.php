<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Renderer;

interface RendererInterface
{
    /**
     * Render a template with parameters.
     *
     * @param string $templatePath
     * @param array $parameters
     * 
     * @return string Rendered Widget
     */
    public function view(string $templatePath, array $parameters = []): string;
}
