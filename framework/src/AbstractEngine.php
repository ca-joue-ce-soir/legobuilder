<?php

declare(strict_types=1);

namespace Legobuilder\Framework;

use Doctrine\DBAL\Connection;
use Legobuilder\Framework\Control\Base\ColorControl;
use Legobuilder\Framework\Control\Base\NumberControl;
use Legobuilder\Framework\Control\Base\TextControl;
use Legobuilder\Framework\Control\Registry\ControlRegistry;
use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;
use Legobuilder\Framework\Database\Repository\WidgetRepository;
use Legobuilder\Framework\Database\Repository\WidgetRepositoryInterface;
use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Endpoint\EndpointExtension;
use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistry;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Widget\Factory\WidgetFactory;
use Legobuilder\Framework\Widget\Factory\WidgetFactoryInterface;
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
     * @var ContainerBuilder Container used for the engine.
     */
    protected $container;

    /**
     * Initializes the engine.
     *
     * @param RendererInterface $renderer The renderer to be used by the engine.
     * @param Connection $connection The database connection to be used by the engine.
     */
    public function __construct(
        RendererInterface $renderer, 
        Connection $connection,
        string $databasePrefix
    ) {
        $container = new ContainerBuilder();

        $container->set('renderer', $renderer);
        $container->set('connection', $connection);
        $container->setParameter('database_prefix', $databasePrefix);

        $this->configureContainer($container);

        $this->container = $container;
        $this->container->compile();

        $this->registerDefaultControls();
        $this->registerPlatformControls();
        $this->registerPlatformWidgetsDefinitions();
        $this->registerPlatformZones();
    }

    /**
     * Configures the container with various registry and factory services.
     *
     * @param ContainerBuilder $container The container builder.
     */
    public function configureContainer(ContainerBuilder &$container)
    {
        $container = new ContainerBuilder();

        $container->register('registry.control_registry', ControlRegistry::class)->setPublic(true);
        $container->setAlias(ControlRegistryInterface::class, 'registry.control_registry');

        $container->register('registry.zone_definition_registry', ZoneDefinitionRegistry::class)->setPublic(true);
        $container->setAlias(ZoneDefinitionRegistryInterface::class, 'registry.zone_definition_registry');

        $container->register('registry.widget_definition_registry', WidgetDefinitionRegistry::class)->setPublic(true);
        $container->setAlias(WidgetDefinitionRegistryInterface::class, 'registry.widget_definition_registry');

        $container->register('repository.widget_repository',  WidgetRepository::class);
        $container->setAlias(WidgetRepositoryInterface::class, 'repository.widget_repository');

        $container->autowire('factory.widget_factory', WidgetFactory::class)->setPublic(true);
        $container->setAlias(WidgetFactoryInterface::class, 'factory.widget_factory');

        $container->autowire('factory.zone_factory', ZoneFactory::class)
            ->setPublic(true);

        $container->register('repository.widget_repository', WidgetRepository::class)
            ->addArgument(['ps_']);
        $container->setAlias(WidgetRepositoryInterface::class, 'repository.widget_repository');

        $container->registerExtension(new EndpointExtension());
        $container->loadFromExtension('endpoint', );
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
