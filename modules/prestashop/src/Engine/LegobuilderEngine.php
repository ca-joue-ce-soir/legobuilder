<?php

namespace Legobuilder\Engine;

use Legobuilder\Framework\AbstractEngine;
use Legobuilder\Framework\Renderer\RendererInterface;
use PrestaShop\PrestaShop\Core\Hook\HookDispatcherInterface;

final class LegobuilderEngine extends AbstractEngine
{
    /**
     * @var HookDispatcherInterface
     */
    private $hookDispatcher;

    public function __construct(RendererInterface $renderer, HookDispatcherInterface $hookDispatcher)
    {
        $this->hookDispatcher = $hookDispatcher;

        parent::__construct($renderer);
    }

    /**
     * Register all the "controls" that are added through PrestaShop modules.
     */
    public function registerPlatformControls(): void
    {
        $this->hookDispatcher->dispatchWithParameters('actionLegobuilderRegisterControls', [
            'registry' => $this->getControlRegistry()
        ]);
    }
    
    /**
     * Register all the "widgets" that are added through PrestaShop modules.
     */
    public function registerPlatformWidgetsDefinitions(): void
    {
        $this->hookDispatcher->dispatchWithParameters('actionLegobuilderRegisterWidgetsDefinitions', [
            'registry' => $this->getWidgetDefinitionRegistry()
        ]);
    }

    /**
     * Register all the "zones" that are added through PrestaShop modules.
     */
    public function registerPlatformZones(): void
    {        
        $this->hookDispatcher->dispatchWithParameters('actionLegobuilderRegisterZones', [
            'registry' => $this->getZoneRegistry()
        ]);
    }
}