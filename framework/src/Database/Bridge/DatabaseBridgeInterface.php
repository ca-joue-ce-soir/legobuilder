<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Bridge;

interface DatabaseBridgeInterface
{
    /**
     * Executes an SQL statement with the given parameters.
     *
     * @param string                                 $query      SQL statement
     * @param array<int, mixed>|array<string, mixed> $parameters
     *
     * @return bool Has been executed successfully
     */
    public function execute(string $query, array $parameters = []): bool;
}
