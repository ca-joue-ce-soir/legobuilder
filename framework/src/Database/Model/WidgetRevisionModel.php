<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Model;

class WidgetRevisionModel
{
    /**
     * @var WidgetModel
     */
    private $widget;

    /**
     * @var array
     */
    private $controlSettings;

    /**
     * Get the value of controlSettings
     *
     * @return array
     */
    public function getControlSettings()
    {
        return $this->controlSettings;
    }

    /**
     * Set the value of controlSettings
     *
     * @param array $controlSettings
     *
     * @return self
     */
    public function setControlSettings(array $controlSettings)
    {
        $this->controlSettings = $controlSettings;

        return $this;
    }
}
