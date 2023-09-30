<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint;

use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Mutator\ZoneMutator;
use Legobuilder\Framework\Endpoint\Resolver\ControlResolver;
use Legobuilder\Framework\Endpoint\Resolver\WidgetDefinitionResolver;
use Legobuilder\Framework\Endpoint\Resolver\WidgetResolver;
use Legobuilder\Framework\Endpoint\Resolver\ZoneDefinitionResolver;
use Legobuilder\Framework\Endpoint\Resolver\ZoneResolver;
use Legobuilder\Framework\Endpoint\Transformer\ControlTransformer;
use Legobuilder\Framework\Endpoint\Transformer\WidgetDefinitionTransformer;
use Legobuilder\Framework\Endpoint\Transformer\ZoneDefinitionTransformer;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class EndpointExtension extends Extension
{
    /**
     * Loads the extension.
     *
     * This method configures the container by autowiring the control resolver, zone resolver, and widget resolver services.
     * It also registers an endpoint service.
     *
     * @param array $configs The array of configurations.
     * @param ContainerBuilder $container The container builder.
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configurationLoader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Ressources/config'));
        $configurationLoader->load('services.yml');

        $container->autowire(WidgetDefinitionResolver::class);
        $container->autowire(ZoneDefinitionTransformer::class);
        
        $container->autowire(WidgetDefinitionTransformer::class);
        $container->autowire(ZoneDefinitionTransformer::class);
        $container->autowire(ControlTransformer::class);

        $container->autowire(ControlResolver::class);
        $container->autowire(ZoneDefinitionResolver::class);
        $container->autowire(WidgetResolver::class);
        $container->autowire(ControlResolver::class);
        $container->autowire(ZoneResolver::class);

        $container->autowire(ZoneMutator::class);

        $container->setAlias(TypeLoaderInterface::class, 'endpoint_type_loader');

        $container->autowire('endpoint', Endpoint::class)->setPublic(true);
        $container->registerAliasForArgument(EndpointInterface::class, 'endpoint');
    }
}
