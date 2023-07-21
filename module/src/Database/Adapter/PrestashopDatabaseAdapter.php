<?php

namespace Legobuilder\Prestashop\Database\Adapter;

use Doctrine\DBAL\Connection;
use Legobuilder\Framework\Database\Adapter\DatabaseAdapterInterface;

final class PrestashopDatabaseAdapter implements DatabaseAdapterInterface
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