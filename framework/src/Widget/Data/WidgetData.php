<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Data;

final class WidgetData implements WidgetDataInterface
{
    /**
     * @var array
     */
    private $controlsData;

    /**
     * Returns data for controls.
     *
     * @return array
     */
    public function getControlsData(): array
    {
        return $this->controlsData;
    }
}
