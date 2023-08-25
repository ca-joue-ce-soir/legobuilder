<?php

declare(strict_types=1);

namespace Legobuilder\Framework;

use Legobuilder\Framework\Control\Base\ColorControl;
use Legobuilder\Framework\Control\Base\NumberControl;
use Legobuilder\Framework\Control\Base\TextControl;
use Legobuilder\Framework\Control\Registry\ControlRegistry;
use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;
use Legobuilder\Framework\Database\Bridge\DatabaseBridgeInterface;
use Legobuilder\Framework\Database\Repository\WidgetModelRepository;
use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Endpoint\EngineEndpoint;
use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistry;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistry;
use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistryInterface;

abstract class AbstractEngine implements EngineInterface
{
    /**
     * @var RendererInterface
     */
    protected $renderer;

    /**
     * @var EndpointInterface
     */
    protected $endpoint;

    /**
     * @var ControlRegistryInterface
     */
    protected $controlRegistry;

    /**
     * @var ZoneDefinitionRegistryInterface
     */
    protected $zoneDefinitionRegistry;

    /**
     * @var WidgetDefinitionRegistryInterface
     */
    protected $widgetDefinitionRegistry;

    /**
     * @var  WidgetModelRepository
     */
    protected $widgetModelRepository;

    public function __construct(RendererInterface $renderer, DatabaseBridgeInterface $databaseBridge)
    {
        $this->renderer = $renderer;
        $this->controlRegistry = new ControlRegistry();
        $this->zoneDefinitionRegistry = new ZoneDefinitionRegistry();
        $this->widgetDefinitionRegistry = new WidgetDefinitionRegistry();

        $this->controlRegistry
            ->registerControl(new TextControl())
            ->registerControl(new NumberControl())
            ->registerControl(new ColorControl())
        ;

        $this->registerPlatformControls();
        $this->registerPlatformWidgetsDefinitions();
        $this->registerPlatformZones();

        $this->endpoint = new EngineEndpoint($this);
    }

    public function getZoneDefinitionRegistry(): ZoneDefinitionRegistryInterface
    {
        return $this->zoneDefinitionRegistry;
    }

    public function getControlRegistry(): ControlRegistryInterface
    {
        return $this->controlRegistry;
    }

    public function getEndpoint(): EndpointInterface
    {
        return $this->endpoint;
    }
}
