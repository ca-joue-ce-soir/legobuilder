<?php

declare(strict_types=1);

namespace Legobuilder\Framework;

use Legobuilder\Framework\Control\Type\ColorControl;
use Legobuilder\Framework\Control\Type\NumberControl;
use Legobuilder\Framework\Control\Type\TextControl;
use Legobuilder\Framework\Control\Registry\ControlRegistry;
use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;
use Legobuilder\Framework\Persistence\Repository\WidgetRepositoryInterface;
use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Endpoint\EndpointExtension;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistry;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Widget\Factory\WidgetFactory;
use Legobuilder\Framework\Widget\Factory\WidgetFactoryInterface;
use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistry;
use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistryInterface;
use Legobuilder\Framework\Zone\Factory\ZoneFactory;
use Legobuilder\Framework\Zone\Factory\ZoneFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * The `AbstractEngine` class is an abstract class that implements the `EngineInterface`.
 * It provides the basic structure and functionality for an engine in a Lego builder framework.
 */
abstract class AbstractEngine implements EngineInterface
{
    /**
     * @var ContainerBuilder Container used for the engine.
     */
    protected $container;

    /**
     * Initializes the engine.
     */
    public function __construct(WidgetRepositoryInterface $widgetRepository)
    {
        $this->container = $this->createContainer($widgetRepository);

        $this->registerDefaultControls();
        $this->registerPlatformControls();
        $this->registerPlatformWidgetsDefinitions();
        $this->registerPlatformZones();
    }

    /**
     * Create the container with various registry and factory services.
     *
     * @param WidgetRepositoryInterface $widgetRepository
     */
    private function createContainer(WidgetRepositoryInterface $widgetRepository)
    {
        $container = new ContainerBuilder();

        $container->register('registry.control_registry', ControlRegistry::class)->setPublic(true);
        $container->setAlias(ControlRegistryInterface::class, 'registry.control_registry');

        $container->register('registry.zone_definition_registry', ZoneDefinitionRegistry::class)->setPublic(true);
        $container->setAlias(ZoneDefinitionRegistryInterface::class, 'registry.zone_definition_registry');

        $container->register('registry.widget_definition_registry', WidgetDefinitionRegistry::class)->setPublic(true);
        $container->setAlias(WidgetDefinitionRegistryInterface::class, 'registry.widget_definition_registry');

        $container->autowire('factory.widget_factory', WidgetFactory::class)
            ->setPublic(true)
            ->setArgument('$widgetRepository', $widgetRepository)
        ;
        $container->setAlias(WidgetFactoryInterface::class, 'factory.widget_factory');

        $container->autowire('factory.zone_factory', ZoneFactory::class)
            ->setPublic(true)
            ->setArgument('$widgetRepository', $widgetRepository)
        ;
        $container->setAlias(ZoneFactoryInterface::class, 'factory.zone_factory');

        $container->registerExtension(new EndpointExtension());
        $container->loadFromExtension('endpoint');

        $container->compile();

        return $container;
    }

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
        return $this->container->get('registry.control_registry');
    }

    /**
     * Returns the widget definition registry.
     *
     * @return WidgetDefinitionRegistryInterface The widget definition registry.
     */
    public function getWidgetDefinitionRegistry(): WidgetDefinitionRegistryInterface
    {
        return $this->container->get('registry.widget_definition_registry');
    }

    /**
     * Returns the engine endpoint.
     *
     * @return EndpointInterface The engine endpoint.
     */
    public function getEndpoint(): EndpointInterface
    {
        return $this->container->get('endpoint');
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
