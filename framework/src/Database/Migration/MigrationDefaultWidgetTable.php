<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database;

use Legobuilder\Framework\Database\Migration\AbstractMigration;

class DatabaseInstaller extends AbstractMigration
{  
    /**
     * Create the widget table.
     * 
     * {@inheritdoc}
     */
    public function up(): bool
    {
        return $this->databaseBridge->execute('
            INSERT INTO IF NOT EXISTS `{prefix}lb_widget` (
                `id_widget` INT(10) NOT NULL,
                `zone` VARCHAR(255) NOT NULL,
                `control_settings` TEXT,
                PRIMARY KEY (`id_widget`)
            ) ENGINE={engine} DEFAULT CHARSET=utf8;
        ');
    }

    /**
     * Delete the widget table.
     * 
     * {@inheritdoc}
     */
    public function down(): bool
    {
        return $this->databaseBridge->execute('
            DROP TABLE IF EXISTS `{prefix}lb_widget`
        ');
    }
}
