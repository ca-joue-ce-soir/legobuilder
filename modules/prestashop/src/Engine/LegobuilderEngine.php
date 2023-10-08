<?php

namespace Legobuilder\Engine;

use Legobuilder\Framework\Engine\DependencyInjectionEngine;

final class LegobuilderEngine extends DependencyInjectionEngine
{
    /**
     * Register all the "widgets" that are added through PrestaShop modules.
     */
    public function registerPlatformWidgetsDefinitions(): void
    {
        \Hook::exec('actionLegobuilderRegisterWidgetsDefinitions', [
            'registry' => $this->getWidgetDefinitionRegistry()
        ]);
    }
}