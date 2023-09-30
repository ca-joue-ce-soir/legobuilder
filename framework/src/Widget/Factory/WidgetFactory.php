<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Factory;

use Legobuilder\Framework\Persistence\Model\WidgetModel;
use Legobuilder\Framework\Persistence\Repository\WidgetRepositoryInterface;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Widget\Widget;
use Legobuilder\Framework\Widget\WidgetInterface;

final class WidgetFactory implements WidgetFactoryInterface
{
    /**
     * @var WidgetRepositoryInterface
     */
    private $widgetRepository;

    /**
     * @var WidgetDefinitionRegistryInterface
     */
    private $widgetDefinitionRegistry;

    /**
     * @var array
     */
    private $widgetCache = [];

    public function __construct(
        WidgetRepositoryInterface $widgetRepository,
        WidgetDefinitionRegistryInterface $widgetDefinitionRegistry)
    {
        $this->widgetRepository = $widgetRepository;
        $this->widgetDefinitionRegistry = $widgetDefinitionRegistry;
    }

    /**
     * Create Widget with controls data.
     *
     * @param WidgetModel $widgetModel
     * @param bool        $useCache
     *
     * @return WidgetInterface
     */
    public function getWidget(WidgetModel $widgetModel, bool $useCache = false): WidgetInterface
    {
        $widgetId = $widgetModel->getId();

        if (true === $useCache && isset($this->widgetCache[$widgetId])) {
            return $this->widgetCache[$widgetId];
        }

        $widgetDefinition = $this->widgetDefinitionRegistry->getWidgetDefinition(
            $widgetModel->getType()
        );

        $widget = new Widget(
            $widgetId,
            $widgetModel->getZone(),
            $widgetModel->getControlSettings(),
            $widgetDefinition
        );

        return $this->widgetCache[$widgetId] = $widget;
    }

    public function getWidgetById(int $id, bool $useCache = false): ?WidgetInterface
    {
        $widgetModel = $this->widgetRepository->find($id);

        if (null == $widgetModel) {
            return null;
        }

        return $this->getWidget($widgetModel);
    }
}
