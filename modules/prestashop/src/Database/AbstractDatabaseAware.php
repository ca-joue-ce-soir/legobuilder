<?php

declare(strict_types=1);

namespace Legobuilder\Database;

use Doctrine\DBAL\Connection;

abstract class AbstractDatabaseAware
{
    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @var string
     */
    protected $databasePrefix;

    public function __construct(Connection $connection, string $databasePrefix)
    {
        $this->connection = $connection;
        $this->databasePrefix = $databasePrefix;
    }
}
