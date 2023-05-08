<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition;

use Legobuilder\Framework\Widget\Control\ControlCollectionInterface;

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
     * Get template path of Widget.
     *
     * @return string
     */
    public function getTemplatePath(): string;

    /**
     * Get list of controls.
     *
     * @return ControlCollectionInterface
     */
    public function getControls();
}
