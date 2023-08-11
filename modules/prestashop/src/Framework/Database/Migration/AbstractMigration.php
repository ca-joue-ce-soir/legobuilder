<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Migration;

use Legobuilder\Framework\Database\Bridge\DatabaseBridgeInterface;

abstract class AbstractMigration
{
    /**
     * @var DatabaseBridgeInterface
     */
    protected $databaseBridge;

    public function __construct(DatabaseBridgeInterface $databaseBridge)
    {
        $this->databaseBridge = $databaseBridge;
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
