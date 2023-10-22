<?php

use Doctrine\DBAL\Connection;
use Legobuilder\Database\Migration\MigrationDefaultWidgetTable;
use Legobuilder\Database\Migration\MigrationExecutor;
use Legobuilder\Framework\WidgetDefinition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Zone\Factory\ZoneFactoryInterface;
use Legobuilder\WidgetDefinition\ProductFeaturesWidgetDefinition;
use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

if (!defined('_PS_VERSION_')) {
    exit();
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

class Legobuilder extends Module implements WidgetInterface
{
    public $tabs = [
        [
            'name' => 'Builder',
            'class_name' => 'BuilderController',
            'parent_class_name' => 'AdminParentThemes',
            'wording' => 'Builder',
            'route_name' => 'legobuilder_editor',
            'wording_domain' => 'Modules.Legobuilder.Admin',
        ],
    ];

    public function __construct()
    {
        $this->name = 'legobuilder';
        $this->tab = 'checkout';
        $this->version = '0.0.1';
        $this->author = 'Ca joue ce soir';
        $this->need_instance = true;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Legobuilder');
        $this->description = $this->l('Description');
    }

    public function install()
    {
        return $this->getMigrateExecutor()->runUp() && parent::install() &&
            $this->registerHook('actionLegobuilderRegisterControls') &&
            $this->registerHook('actionLegobuilderRegisterWidgetsDefinitions') &&
            $this->registerHook('actionLegobuilderRegisterZones')
        ;
    }

    public function uninstall()
    {
        return $this->getMigrateExecutor()->runDown() && parent::uninstall();
    }

    /**
     * Retrieves the MigrateExecutor that will be used for the 
     * database installation and uninstallation.
     *
     * @return MigrationExecutor The MigrateExecutor.
     */
    private function getMigrateExecutor(): MigrationExecutor
    {
        /** @var Connection $doctrineConnection */
        $doctrineConnection = $this->get('doctrine.dbal.default_connection');

        $migrationExecutor = (new MigrationExecutor())
            ->registerMigration(new MigrationDefaultWidgetTable($doctrineConnection, _DB_PREFIX_));

        return $migrationExecutor;
    }
    
    /**
     * Registers widget definitions.
     *
     * @param array $params Hook parameters.
     */
    public function hookActionLegobuilderRegisterWidgetsDefinitions(array $params)
    {
        /** @var WidgetDefinitionRegistryInterface $widgetDefinitionRegistry */
        $widgetDefinitionRegistry = $params['registry'];

        $translator = $this->getTranslator();

        $widgetDefinitionRegistry
            ->registerWidgetDefinition(new ProductFeaturesWidgetDefinition($translator, $this->context->smarty))
        ;
    }

    /**
     * Render the zone.
     *
     * @param string $hookName The name of the hook.
     * @param array $configuration The configuration.
     * 
     * @return string Rendered zone.
     */
    public function renderWidget($hookName, array $configuration)
    {
        $zone = $this->getWidgetVariables($hookName, $configuration);

        return $zone->render();
    }

    /**
     * Retrieves the widget variables for a given hook name and configuration.
     *
     * @param string $hookName The name of the hook.
     * @param array $configuration The configuration.
     *
     * @return Zone The zone.
     */
    public function getWidgetVariables($hookName, array $configuration)
    {
        $zoneIdentifier = $configuration['zone'] ?? $hookName;

        /** @var ZoneFactoryInterface $zoneFactory */
        $zoneFactory = $this->get(ZoneFactoryInterface::class);
        $zone = $zoneFactory->getZone($zoneIdentifier);

        return $zone;
    }
}
