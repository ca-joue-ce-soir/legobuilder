<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint;

use GraphQL\Error\DebugFlag;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use GraphQL\Type\SchemaConfig;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Type\MutationType;

class Endpoint implements EndpointInterface
{
    /**
     * @var Schema
     */
    private $schema;

    public function __construct(TypeLoaderInterface $typeLoader)
    {
        $schemaConfig = SchemaConfig::create()
            ->setTypeLoader([$typeLoader, 'get'])
            ->setQuery($typeLoader->get(QueryType::class))
            ->setMutation($typeLoader->get(MutationType::class));

        $this->schema = new Schema($schemaConfig);
    }

    /**
     * Execute GraphQL query based on the endpoint schema.
     *
     * {@inheritdoc}
     */
    public function execute(string $query, ?array $variableValues = null): array
    {
        $result = GraphQL::executeQuery($this->schema, $query, null, null, $variableValues);

        return $result->toArray(DebugFlag::INCLUDE_TRACE | DebugFlag::INCLUDE_DEBUG_MESSAGE);
    }
}
