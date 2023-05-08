<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint;

use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use GraphQL\Type\SchemaConfig;
use Legobuilder\Framework\Endpoint\Type\MutationType;
use Legobuilder\Framework\Endpoint\Type\QueryType;
use Legobuilder\Framework\Endpoint\Types\TypeCollection;
use Legobuilder\Framework\Endpoint\Types\TypeCollectionInterface;
use Legobuilder\Framework\Endpoint\Type\WidgetType;

abstract class AbstractEndpoint implements EndpointInterface
{
    /**
     * @var TypeCollectionInterface
     */
    private $types;

    /**
     * @var Schema
     */
    private $schema;

    public function __construct(iterable $types)
    {
        $this->types = (new TypeCollection())
            ->add(new WidgetType());

        $schemaConfig = SchemaConfig::create()
            ->setQuery(new QueryType())
            ->setMutation(new MutationType());

        $this->schema = new Schema($schemaConfig);
    }

    /**
     * Execute GraphQL query based on the endpoint schema.
     *
     * @param string $query
     * @param ?array $variableValues
     * @return array Output result
     */
    public function execute(string $query, ?array $variableValues): array
    {
        $result = GraphQL::executeQuery($this->schema, $query, null, null, $variableValues);
        return $result->toArray();
    }
}
