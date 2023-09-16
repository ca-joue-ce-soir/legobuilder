<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint;

interface EndpointInterface
{
    /**
     * Execute GraphQL query based on the endpoint schema.
     *
     * @param  string $query
     * @param  ?array $variableValues
     * @return array Output result
     */
    public function execute(string $query, ?array $variableValues): array;
}
