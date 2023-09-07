<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Migration;

interface MigrationInterface
{
    /**
     * Run the migration.
     *
     * @throws DatabaseException
     * @return bool Success
     */
    public function up(): bool;

    /**
     * Reverse the migration.
     *
     * @throws DatabaseException
     * @return bool Success
     */
    public function down(): bool;
}
