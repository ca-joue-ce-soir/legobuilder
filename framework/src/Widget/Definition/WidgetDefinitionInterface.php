<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition;

use Legobuilder\Framework\Widget\Definition\Control\WidgetDefinitionControlCollectionInterface;
use Legobuilder\Framework\Widget\Definition\Control\WidgetDefinitionControlsBuilderInterface;
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
     * Build Widget Definition Controls that will be saved in the 
     * "controls" property afterwards.
     * 
     * @param WidgetDefinitionControlsBuilderInterface $widgetDefinitionControlsBuilder
     */
    public function buildControls(WidgetDefinitionControlsBuilderInterface $widgetDefinitionControlsBuilder): void;

    /**
     * Get list of controls.
     */
    public function getControls(): WidgetDefinitionControlCollectionInterface;

    /**
     * Set list of controls.
     */
    public function setControls(WidgetDefinitionControlCollectionInterface $widgetDefinitionControls);

    /**
     * Render the widget from the definition.
     *
     * @param WidgetInterface $widget
     * @return string Rendered widget
     */
    public function render(WidgetInterface $widget): string;
}
