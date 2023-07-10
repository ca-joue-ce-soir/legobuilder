<?php

namespace Legobuilder\Prestashop\Database;

use Doctrine\DBAL\Connection;
use Legobuilder\Framework\Database\DatabaseBridgeInterface;

final class PrestashopDatabaseBridge implements DatabaseBridgeInterface
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function execute(string $query, array $parameters = []): bool
    {
        return $this->connection->executeStatement($query, $parameters);
    }
}