<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Migration;

use Doctrine\DBAL\Schema\Table;
use Legobuilder\Framework\Database\AbstractDatabaseAware;
use Exception;

class MigrationDefaultWidgetTable extends AbstractDatabaseAware
{
    /**
     * Create the widget table.
     *
     * {@inheritdoc}
     */
    public function up(): bool
    {
        try {
            $schemaManager = $this->connection->createSchemaManager();

            $widgetTable = new Table($this->databasePrefix . 'widget');
            $widgetTable->addColumn('id_widget', 'integer', ['unsigned' => true]);
            $widgetTable->addColumn('type', 'string', ['length' => '32']);
            $widgetTable->addColumn('zone', 'string', ['length' => 32]);
            $widgetTable->setPrimaryKey(['id_widget']);

            $schemaManager->createTable($widgetTable);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * Delete the widget table.
     *
     * {@inheritdoc}
     */
    public function down(): bool
    {
        try {
            $schemaManager = $this->connection->createSchemaManager();
            $schemaManager->dropTable($this->databasePrefix . 'widget');
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}
