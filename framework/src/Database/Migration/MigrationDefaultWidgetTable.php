<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database;

use Legobuilder\Framework\Database\Migration\AbstractMigration;

class DatabaseInstaller extends AbstractMigration
{
    public function up(): bool
    {
        return $this->databaseBridge->execute('
            INSERT INTO `{prefix}widget`
        ');
    }

    public function down(): bool
    {
        
    }
}
