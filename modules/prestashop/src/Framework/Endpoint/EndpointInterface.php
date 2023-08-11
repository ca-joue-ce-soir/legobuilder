<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint;

interface EndpointInterface
{
    public function execute(string $query, ?array $variableValues): array;
}
