<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Factory;

use Legobuilder\Framework\Database\Model\WidgetModel;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Widget\Widget;
use Legobuilder\Framework\Widget\WidgetInterface;

final class WidgetFactory implements WidgetFactoryInterface
{
    /**
     * @var WidgetDefinitionRegistryInterface
     */
    private $widgetDefinitionRegistry;

    /**
     * @var array
     */
    private $widgetCache = [];

    /**
     * Create Widget with controls data.
     *
     * @param WidgetModel $widgetModel
     * @param bool $useCache
     * 
     * @return WidgetInterface
     */
    public function loadWidget(WidgetModel $widgetModel, bool $useCache = false): WidgetInterface
    {
        $widgetId = $widgetModel->getId();

        if (true === $useCache && isset($this->widgetCache[$widgetId])) {
            return $this->widgetCache[$widgetId];
        }

        $widgetDefinition = $this->widgetDefinitionRegistry->getWidgetDefinition(
            $widgetModel->getDefinitionId()
        );

        $widget = new Widget($widgetId, $widgetModel->getZone(), $widgetDefinition);
        
        // @todo Set controls settings.
        // @todo Get the widget data / dynamic ones.

        return $this->widgetCache[$widgetId] = $widget;
    }
}
