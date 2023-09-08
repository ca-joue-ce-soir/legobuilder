<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Renderer;

class HTMLRenderer implements RendererInterface
{
    /**
     * Render a template with parameters.
     *
     * @param string $templatePath The path to the template file.
     * @param array  $parameters   The parameters to be passed to the template.
     *
     * @return string The rendered widget.
     */
    public function view(string $templatePath, array $parameters = []): string
    {
        ob_start();
        extract($parameters);
        include_once $templatePath;
        return ob_get_flush();
    }
}
