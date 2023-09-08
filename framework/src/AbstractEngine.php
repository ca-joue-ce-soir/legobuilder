<?php

declare(strict_types=1);

namespace Legobuilder\Framework;

use Legobuilder\Framework\Control\Base\ColorControl;
use Legobuilder\Framework\Control\Base\NumberControl;
use Legobuilder\Framework\Control\Base\TextControl;
use Legobuilder\Framework\Control\Registry\ControlRegistry;
use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;
use Legobuilder\Framework\Database\Bridge\DatabaseBridgeInterface;
use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Endpoint\EngineEndpoint;
use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistry;
use Legobuilder\Framework\Widget\Factory\WidgetFactory;
use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistry;
use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistryInterface;
use Legobuilder\Framework\Zone\Factory\ZoneFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * The `AbstractEngine` class is an abstract class that implements the `EngineInterface`.
 * It provides the basic structure and functionality for an engine in a Lego builder framework.
 */
abstract class AbstractEngine implements EngineInterface
{
    /**
     * @var RendererInterface The renderer used by the engine.
     */
    protected $renderer;

    /**
     * @var DatabaseBridgeInterface
     */
    protected $databaseBridge;

    /**
     * @var ContainerBuilder Container used for the engine.
     */
    protected $container;

    /**
     * Initializes the engine.
     *
     * @param RendererInterface       $renderer       The renderer to be used by the engine.
     * @param DatabaseBridgeInterface $databaseBridge The database bridge to be used by the engine.
     */
    public function __construct(RendererInterface $renderer, DatabaseBridgeInterface $databaseBridge)
    {
        $this->renderer = $renderer;
        $this->databaseBridge = $databaseBridge;

        $container = new ContainerBuilder();

        $container->register('registry.control_registry', ControlRegistry::class);
        $container->register('registry.zone_definition_registry', ZoneDefinitionRegistry::class);
        $container->register('registry.widget_definition_registry', WidgetDefinitionRegistry::class);

        $container->register('factory.widget_factory', WidgetFactory::class);
        $container->register('factory.zone_factory', ZoneFactory::class);

        $container->register('endpoint', EngineEndpoint::class)
            ->setArguments([ $this ]);

        $this->configureContainer($container);

        $this->container = $container;
        $this->container->compile();

        $this->registerDefaultControls();
        $this->registerPlatformControls();
        $this->registerPlatformWidgetsDefinitions();
        $this->registerPlatformZones();
    }

    abstract public function configureContainer(ContainerBuilder $container);

    /**
     * Returns the zone definition registry.
     *
     * @return ZoneDefinitionRegistryInterface The zone definition registry.
     */
    public function getZoneDefinitionRegistry(): ZoneDefinitionRegistryInterface
    {
        return $this->container->get('registry.zone_definition_registry');
    }

    /**
     * Returns the control registry.
     *
     * @return ControlRegistryInterface The control registry.
     */
    public function getControlRegistry(): ControlRegistryInterface
    {
        return $this->$this->container->get('registry.control_registry');
    }

    /**
     * Returns the engine endpoint.
     *
     * @return EndpointInterface The engine endpoint.
     */
    public function getEndpoint(): EndpointInterface
    {
        return $this->$this->container->get('endpoint');
    }

    /**
     * Registers the default controls.
     */
    protected function registerDefaultControls(): void
    {
        $this->getControlRegistry()
            ->registerControl(new TextControl())
            ->registerControl(new NumberControl())
            ->registerControl(new ColorControl());
    }
}
