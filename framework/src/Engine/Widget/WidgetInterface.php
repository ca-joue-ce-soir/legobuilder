<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Widget;

use Legobuilder\Framework\Engine\WidgetDefinition\WidgetDefinitionInterface;

interface WidgetInterface
{
    /**
     * Get Widget ID.
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get Widget Zone identifier.
     *
     * @return string
     */
    public function getZoneId(): string;

    /**
     * Get Widget definition.
     *
     * @return WidgetDefinitionInterface
     */
    public function getDefinition(): WidgetDefinitionInterface;

    /**
     * Get Widget Control Settings.
     *
     * @return array
     */
    public function getSettings(): array;
}
