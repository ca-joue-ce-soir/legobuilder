<?php

use Doctrine\DBAL\Connection;
use Legobuilder\Control\ProductControl;
use Legobuilder\Framework\Database\Migration\MigrationDefaultWidgetTable;
use Legobuilder\Framework\Database\Migration\MigrationExecutor;
use Legobuilder\Database\Adapter\PrestashopDatabaseAdapter;
use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;
use Legobuilder\Framework\Zone\Registry\ZoneRegistryInterface;
use Legobuilder\Framework\EngineInterface;
use Legobuilder\Framework\Widget\Type\Registry\WidgetTypeRegistryInterface;
use Legobuilder\Framework\Zone\Zone;
use Legobuilder\Widget\ProductFeaturesWidgetDefinition;
use Symfony\Contracts\Translation\TranslatorInterface;
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
        $controlRegistry = $params['registry'];

        $controlRegistry->registerControl(new ProductControl());
    }
    
    public function hookActionLegobuilderRegisterWidgetsDefinitions(array $params)
    {
        /** @var WidgetTypeRegistryInterface $widgetTypeRegistry */
        $widgetTypeRegistry = $params['registry'];

        /** @var TranslatorInterface $translator */
        $translator = $this->get('translator');

        $widgetTypeRegistry
            ->registerWidgetType(new ProductFeaturesWidgetDefinition($translator))
        ;
    }

    public function hookActionLegobuilderRegisterZones(array $params)
    {
        /** @var ZoneRegistryInterface $registry */
        $zoneRegistry = $params['registry'];

        $zoneRegistry
            ->registerZone(new Zone('displayHome'))
            ->registerZone(new Zone('cms', ['id' => '[0-9]*']));
    }

    public function renderWidget($hookName, array $configuration)
    {
        if (!isset($configuration['zone'])) {
            return;
        }

        /** @var EngineInterface $engine */
        $engine = $this->get('legobuilder.engine');
        $zone = $configuration['zone'];

        return $engine->renderZone($zone);
    }

    public function getWidgetVariables($hookName, array $configuration)
    {
        
    }
}
