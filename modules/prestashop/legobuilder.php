<?php

use Doctrine\DBAL\Connection;
use Legobuilder\Control\ProductControl;
use Legobuilder\Framework\Database\Migration\MigrationDefaultWidgetTable;
use Legobuilder\Framework\Database\Migration\MigrationExecutor;
use Legobuilder\Database\Adapter\PrestashopDatabaseAdapter;
use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;
use Legobuilder\Framework\EngineInterface;
use Legobuilder\Framework\Widget\WidgetInterface as WidgetWidgetInterface;
use Legobuilder\Framework\Zone\Registry\ZoneRegistryInterface;
use Legobuilder\Framework\Zone\Zone;
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

    private function getMigrateExecutor(): MigrationExecutor
    {
        /** @var Connection $doctrineConnection */
        $doctrineConnection = $this->get('doctrine.dbal.default_connection');
        $databaseAdapter = new PrestashopDatabaseAdapter($doctrineConnection);

        $migrationExecutor = (new MigrationExecutor($databaseAdapter))
            ->registerMigration(MigrationDefaultWidgetTable::class);

        return $migrationExecutor;
    }

    public function hookActionLegobuilderRegisterControls(array $params)
    {
        /** @var ControlRegistryInterface $registry */
        $registry = $params['registry'];

        $registry->registerControl(new ProductControl());
    }

    public function hookActionLegobuilderRegisterWidgetsDefinitions()
    {
    }

    public function hookActionLegobuilderRegisterZones(array $params)
    {
        /** @var ZoneRegistryInterface $registry */
        $registry = $params['registry'];

        $registry
            ->registerZone(new Zone('displayHome'))
            ->registerZone(new Zone('cms'));
    }

    public function renderWidget($hookName, array $configuration)
    {
        if (!isset($configuration['zone'])) {
            return;
        }

        $zone = $configuration['zone'];

        /** @var EngineInterface $engine */
        $engine = $this->get('legobuilder.engine');
        $engineZones = $engine->getZoneRegistry()->getRegisteredZones();

        if (!in_array($zone, $engineZones)) {
            return;
        }

        /** @var WidgetWidgetInterface $widget */
        $widget = $this->getWidgetVariables($hookName, $configuration);

        if (null === $widget) {
            return 'ERROR!';
        }

        $engineRenderer = $engine->getRenderer();
        return $engineRenderer->renderWidget($widget);
    }

    public function getWidgetVariables($hookName, array $configuration)
    {
        
    }
}
