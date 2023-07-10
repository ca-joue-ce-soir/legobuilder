<?php

namespace Legobuilder\Prestashop\Engine;

use Legobuilder\Framework\AbstractEngine;
use Legobuilder\Framework\Database\DatabaseBridgeInterface;
use Legobuilder\Framework\Renderer\RendererInterface;
use PrestaShop\PrestaShop\Core\Hook\HookDispatcherInterface;

final class LegobuilderEngine extends AbstractEngine
{
    /**
     * @var HookDispatcherInterface
     */
    private $hookDispatcher;

    public function __construct(
        RendererInterface $renderer,
        DatabaseBridgeInterface $databaseBridge,
        HookDispatcherInterface $hookDispatcher
        )
    {
        $this->hookDispatcher = $hookDispatcher;

        parent::__construct($renderer, $databaseBridge);
    }

    public function registerPlatformControls(): void
    {
        $this->hookDispatcher->dispatchWithParameters('actionLegobuilderRegisterControls', [
            'registry' => $this->getControlRegistry()
        ]);
    }
    
    public function registerPlatformWidgetsDefinitions(): void
    {
        $this->hookDispatcher->dispatchWithParameters('actionLegobuilderRegisterWidgetsDefinitions', [
            'registry' => $this->getWidgetDefinitionRegistry()
        ]);
    }
}