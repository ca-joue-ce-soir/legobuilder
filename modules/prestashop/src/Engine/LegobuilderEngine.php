<?php

namespace Legobuilder\Engine;

use Legobuilder\Framework\AbstractEngine;

final class LegobuilderEngine extends AbstractEngine
{
    /**
     * Register all the "controls" that are added through PrestaShop modules.
     */
    public function registerPlatformControls(): void
    {
        \Hook::exec('actionLegobuilderRegisterControls', [
            'registry' => $this->getControlRegistry()
        ]);
    }
    
    /**
     * Register all the "widgets" that are added through PrestaShop modules.
     */
    public function registerPlatformWidgetsDefinitions(): void
    {
        \Hook::exec('actionLegobuilderRegisterWidgetsDefinitions', [
            'registry' => $this->getWidgetDefinitionRegistry()
        ]);
    }

    /**
     * Register all the "zones" that are added through PrestaShop modules.
     */
    public function registerPlatformZones(): void
    {        
        \Hook::exec('actionLegobuilderRegisterZones', [
            'registry' => $this->getZoneDefinitionRegistry()
        ]);
    }
}