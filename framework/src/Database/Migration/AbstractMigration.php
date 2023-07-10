<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Migration;

use Legobuilder\Framework\Database\DatabaseBridgeInterface;

abstract class AbstractMigration
{
    /**
     * @var DatabaseBridgeInterface
     */
    protected $databaseBridge;

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
