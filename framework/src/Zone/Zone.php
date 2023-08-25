<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone;

use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\Widget;
use Legobuilder\Framework\Widget\WidgetInterface;

final class Zone implements ZoneInterface
{
    /**
     * @var string
     */
    private $definition;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var WidgetInterface[]
     */
    private $widgets;

    public function addWidget(WidgetInterface $widget)
    {
        $widgets[] = $widget;

        return $this;
    }

    public function render(RendererInterface $renderer): string
    {
        $zoneRender = '';

        foreach ($this->widgets as $widget) {
            $zoneRender .= $widget->render($renderer);
        }

        return $zoneRender;
    }
}
