<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Widget\Definition;

use Iterator;
use Legobuilder\Framework\Engine\Widget\WidgetInterface;

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
     */
    public function getControls(): array;

    /**
     * Render the widget from the definition.
     *
     * @param WidgetInterface $widget
     * @return string Rendered widget
     */
    public function render(WidgetInterface $widget): string;
}
