<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget;

use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;

interface WidgetInterface
{
    /**
     * Get Widget definition.
     *
     * @return WidgetDefinitionInterface
     */
    public function getDefinition();

    /**
     * Get Widget data.
     *
     * @return array
     */
    public function getData();

    public function render(RendererInterface $renderer): string;
}