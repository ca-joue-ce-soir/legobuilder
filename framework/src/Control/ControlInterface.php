<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control;

use Legobuilder\Framework\Control\Option\ControlOptions;

interface ControlInterface
{
    /**
     * Get unique control type.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Get default date from the control.
     *
     * @return ControlOptions
     */
    public function getOptions(): ControlOptions;
}
