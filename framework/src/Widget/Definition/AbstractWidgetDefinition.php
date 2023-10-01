<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition;

use Legobuilder\Framework\Widget\Definition\Control\WidgetDefinitionControlCollectionInterface;
use Legobuilder\Framework\Widget\Definition\Control\WidgetDefinitionControlsBuilderInterface;

abstract class AbstractWidgetDefinition implements WidgetDefinitionInterface
{
    /**
     * @var WidgetDefinitionControlCollectionInterface
     */
    private $widgetDefinitionControls;

    public function buildControls(WidgetDefinitionControlsBuilderInterface $widgetDefinitionControlsBuilder): void 
    {
    }
    
    /**
     * Retrieves the controls for the widget definition.
     *
     * @return WidgetDefinitionControlCollectionInterface The collection of controls.
     */
    public function getControls(): WidgetDefinitionControlCollectionInterface
    {
        return $this->widgetDefinitionControls;
    }

    /**
     * Sets the controls for the widget definition.
     *
     * @param WidgetDefinitionControlCollectionInterface $widgetDefinitionControls The collection of controls for the widget definition.
     */
    public function setControls(WidgetDefinitionControlCollectionInterface $widgetDefinitionControls)
    {
        $this->widgetDefinitionControls = $widgetDefinitionControls;
    }
}
