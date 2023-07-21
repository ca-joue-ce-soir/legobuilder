<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Migration;

use Legobuilder\Framework\Database\Adapter\DatabaseAdapterInterface;

abstract class AbstractMigration
{
    /**
     * @var DatabaseAdapterInterface
     */
    protected $databaseAdapter;

    public function __construct(DatabaseAdapterInterface $databaseAdapter)
    {
        $this->databaseAdapter = $databaseAdapter;
    }

    /**
     * Run the migration.
     *
     * @throws DatabaseException
     * @return bool Success
     */
    public abstract function up(): bool;

    /**
     * Reverse the migration.
     *
     * @throws DatabaseException
     * @return bool Success
     */
    public abstract function down(): bool;
}
