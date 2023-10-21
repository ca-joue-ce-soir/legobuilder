<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine;

interface EngineInterface
{
    /**
     * Handles the register of all the Widgets Definitions for the platform.
     */
    public function registerPlatformWidgetsDefinitions(): void;
}
