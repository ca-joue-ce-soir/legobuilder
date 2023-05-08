<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Data;

interface WidgetDataInterface
{
    /**
     * Returns data for controls.
     *
     * @return array
     */
    public function getControlsData(): array;
}
