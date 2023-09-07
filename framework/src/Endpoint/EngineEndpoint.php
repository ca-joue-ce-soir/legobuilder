<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint;

use GraphQL\Error\DebugFlag;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use GraphQL\Type\SchemaConfig;
use Legobuilder\Framework\Endpoint\Loader\TypeLoader;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Resolver\ControlResolver;
use Legobuilder\Framework\Endpoint\Resolver\WidgetResolver;
use Legobuilder\Framework\Endpoint\Resolver\ZoneResolver;
use Legobuilder\Framework\Endpoint\Type\ControlType;
use Legobuilder\Framework\Endpoint\Type\MutationType;
use Legobuilder\Framework\Endpoint\Type\QueryType;
use Legobuilder\Framework\Endpoint\Type\WidgetDefinitionType;
use Legobuilder\Framework\Endpoint\Type\WidgetType;
use Legobuilder\Framework\Endpoint\Type\ZoneType;
use Legobuilder\Framework\EngineInterface;

class EngineEndpoint implements EndpointInterface
{
    /**
     * @var Schema
     */
    private $schema;

    /**
     * @var TypeLoaderInterface
     */
    private $typeLoader;

    public function __construct(EngineInterface $engine)
    {
        $zoneResolver = new ZoneResolver($engine->getZoneRegistry());
        $widgetResolver = new WidgetResolver($engine->getWidgetDefinitionRegistry());
        $controlResolver = new ControlResolver($engine->getControlRegistry());

        $this->typeLoader = (new TypeLoader())
            ->register(ControlType::class)
            ->register(WidgetType::class)
            ->register(ZoneType::class)
            ->register(WidgetDefinitionType::class);

        $schemaConfig = SchemaConfig::create()
            ->setTypeLoader([$this->typeLoader, 'get'])
            ->setQuery(new QueryType($zoneResolver, $widgetResolver, $controlResolver))
            ->setMutation(new MutationType());

        $this->schema = new Schema($schemaConfig);
    }

    /**
     * Execute GraphQL query based on the endpoint schema.
     *
     * @param  string $query
     * @param  ?array $variableValues
     * @return array Output result
     */
    public function execute(string $query, ?array $variableValues = null): array
    {
        $result = GraphQL::executeQuery($this->schema, $query, null, null, $variableValues);
        
        return $result->toArray(DebugFlag::INCLUDE_TRACE | DebugFlag::INCLUDE_DEBUG_MESSAGE);
    }
}
