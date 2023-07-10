<?php

declare(strict_types=1);

namespace Legobuilder\Framework;

use Legobuilder\Framework\Control\Base\ColorControl;
use Legobuilder\Framework\Control\Base\NumberControl;
use Legobuilder\Framework\Control\Base\TextControl;
use Legobuilder\Framework\Control\Registry\ControlRegistry;
use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;
use Legobuilder\Framework\Database\DatabaseBridgeInterface;
use Legobuilder\Framework\Database\Migration\MigrationExecutor;
use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistry;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Zone\Registry\ZoneRegistryInterface;

abstract class AbstractEngine implements EngineInterface
{
    /**
     * @var Migrationexec
     */
    protected $migrationExecutor;

    /**
     * @var RendererInterface
     */
    protected $renderer;

    /**
     * @var EndpointInterface
     */
    protected $endpoint;

    /**
     * @var ZoneRegistryInterface
     */
    protected $zoneRegistry;

    /**
     * @var ControlRegistryInterface
     */
    protected $controlRegistry;

    /**
     * @var WidgetDefinitionRegistryInterface
     */
    protected $widgetDefinitionRegistry;

    public function __construct(
        RendererInterface $renderer,
        DatabaseBridgeInterface $databaseBridge)
    {
        $this->renderer = $renderer;
        $this->controlRegistry = new ControlRegistry();
        $this->widgetDefinitionRegistry = new WidgetDefinitionRegistry();
        $this->migrationExecutor = new MigrationExecutor($databaseBridge);

        $this->controlRegistry
            ->registerControl(new TextControl())
            ->registerControl(new NumberControl())
            ->registerControl(new ColorControl())
        ;

        $this->registerPlatformControls();
        $this->registerPlatformWidgetsDefinitions();
    }

    /**
     * Handles the register of all the Controls for the platform, methods
     * differ for PrestaShop or Wordpress for example.
     */
    public abstract function registerPlatformControls(): void;

    /**
     * Handles the register of all the Widgets Definitions for the platform.
     */
    public abstract function registerPlatformWidgetsDefinitions(): void;

    public function getRenderer(): RendererInterface
    {
        return $this->renderer;
    }

    public function getZoneRegistry(): ZoneRegistryInterface
    {
        return $this->zoneRegistry;
    }

    public function getWidgetDefinitionRegistry(): WidgetDefinitionRegistryInterface
    {
        return $this->widgetDefinitionRegistry;
    }

    public function getControlRegistry(): ControlRegistryInterface
    {
        return $this->controlRegistry;
    }

    public function getEndpoint(): EndpointInterface
    {
        return $this->endpoint;
    }

    public function getMigrationExecutor(): MigrationExecutor
    {
        return $this->migrationExecutor;
    }
}
