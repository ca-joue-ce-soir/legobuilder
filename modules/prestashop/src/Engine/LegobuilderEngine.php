<?php

namespace Legobuilder\Engine;

use Legobuilder\Framework\Engine\EngineInterface;
use Legobuilder\Framework\Engine\WidgetDefinition\Registry\WidgetDefinitionRegistry;
use Legobuilder\Framework\Engine\WidgetDefinition\Registry\WidgetDefinitionRegistryInterface;

final class LegobuilderEngine implements EngineInterface
{
    /**
     * @var WidgetDefinitionRegistryInterface
     */
    private $widgetDefinitionRegistry;

    public function __construct(WidgetDefinitionRegistry $widgetDefinitionRegistry)
    {
        $this->widgetDefinitionRegistry = $widgetDefinitionRegistry;

        $this->registerPlatformWidgetsDefinitions();
    }

    /**
     * Register all the "widgets" that are added through PrestaShop modules.
     */
    public function registerPlatformWidgetsDefinitions(): void
    {
        \Hook::exec('actionLegobuilderRegisterWidgetsDefinitions', [
            'registry' => $this->widgetDefinitionRegistry
        ]);
    }
}