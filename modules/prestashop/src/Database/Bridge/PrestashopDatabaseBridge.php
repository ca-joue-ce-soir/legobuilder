<?php

namespace Legobuilder\Database\Bridge;

use Doctrine\DBAL\Connection;
use Legobuilder\Framework\Database\Bridge\DatabaseBridgeInterface;

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
        $query = str_replace('{prefix}', _DB_PREFIX_, $query);
        $query = str_replace('{engine}', _MYSQL_ENGINE_, $query);
        
        $this->connection->executeStatement($query, $parameters);

        return true;
    }
}