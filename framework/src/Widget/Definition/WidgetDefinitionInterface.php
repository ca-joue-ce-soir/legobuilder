<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition;

use Legobuilder\Framework\Widget\Definition\Control\WidgetDefinitionControlCollectionInterface;
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
     * @param WidgetInterface $widget
     * @return string Rendered widget
     */
    public function render(WidgetInterface $widget): string;
}
