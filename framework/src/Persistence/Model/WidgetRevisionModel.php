<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Persistence\Model;

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

    public function __construct(WidgetModel $widgetModel)
    {
        $this->widget = $widgetModel;
    }

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

    /**
     * Get the value of widget
     *
     * @return  WidgetModel
     */
    public function getWidget()
    {
        return $this->widget;
    }
}
