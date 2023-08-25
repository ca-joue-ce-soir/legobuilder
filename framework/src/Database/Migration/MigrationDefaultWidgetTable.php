<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Migration;

class MigrationDefaultWidgetTable extends AbstractDatabaseMigration
{  
    /**
     * Create the widget table.
     * 
     * {@inheritdoc}
     */
    public function up(): bool
    {
        return $this->databaseBridge->execute('
            CREATE TABLE IF NOT EXISTS `{prefix}lb_widget` (
                `id_widget` INT(10) NOT NULL,
                `definition_id` VARCHAR(255) NOT NULL,
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
