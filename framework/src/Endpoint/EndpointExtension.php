<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint;

use GraphQL\Type\Definition\NamedType;
use Legobuilder\Framework\Endpoint\Loader\TypeLoader;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Resolver\ControlResolver;
use Legobuilder\Framework\Endpoint\Resolver\WidgetResolver;
use Legobuilder\Framework\Endpoint\Resolver\ZoneDefinitionResolver;
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

        $container->autowire(ControlResolver::class);
        $container->autowire(ZoneDefinitionResolver::class);
        $container->autowire(WidgetResolver::class);

        $container->setAlias(TypeLoaderInterface::class, 'type_loader');

        $container->autowire('endpoint', Endpoint::class)->setPublic(true);
        $container->registerAliasForArgument(EndpointInterface::class, 'endpoint');
    }
}
