<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition;

use Legobuilder\Framework\Control\Widget\Definition\Control\WidgetDefinitionControlCollectionInterface;
use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\WidgetInterface;

interface WidgetDefinitionInterface
{
    /**
     * Get unique Widget identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Get Widget name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get list of controls.
     *
     * @return WidgetDefinitionControlCollectionInterface
     */
    public function getControls(): WidgetDefinitionControlCollectionInterface;

    /**
     * Render the widget from the definition.
     *
     * @param WidgetInterface   $widget
     * @param RendererInterface $renderer
     *
     * @return string Rendered widget
     */
    public function render(WidgetInterface $widget, RendererInterface $renderer): string;
}
