<?php

declare(strict_types=1);

namespace Legobuilder\Framework\WidgetDefinition;

use Iterator;
use Legobuilder\Framework\Widget\WidgetInterface;
use Legobuilder\Framework\WidgetDefinition\Controls\WidgetDefinitionControls;

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
     * Get control of the widget definition.
     *
     * @return WidgetDefinitionControls
     */
    public function getControls(): WidgetDefinitionControls;

    /**
     * Render the widget from the definition.
     *
     * @param WidgetInterface $widget
     * @return string Rendered widget
     */
    public function render(WidgetInterface $widget): string;
}
