<?php

use Legobuilder\Framework\EngineInterface;

if (!defined('_PS_VERSION_')) {
    exit();
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

class Legobuilder extends Module 
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
        $this->version = '4.2.1';
        $this->author = 'Ca joue ce soir';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Legobuilder');
        $this->description = $this->l('Description');
    }

    public function install()
    {
        /** @var EngineInterface $legobuilderEngine */
        $legobuilderEngine = $this->get('legobuilder.engine');
        $migrationExecutor = $legobuilderEngine->getMigrationExecutor();

        return parent::install() && $migrationExecutor->runUp() &&
            $this->registerHook('actionLegobuilderRegisterControls') &&
            $this->registerHook('actionLegobuilderRegisterWidgetsDefinitions')
        ;
    }

    public function uninstall()
    {
        /** @var EngineInterface $legobuilderEngine */
        $legobuilderEngine = $this->get('legobuilder.engine');
        $migrationExecutor = $legobuilderEngine->getMigrationExecutor();

        return parent::uninstall() && $migrationExecutor->runDown() &&
            $this->unregisterHook('actionLegobuilderRegisterControls') &&
            $this->unregisterHook('actionLegobuilderRegisterWidgetsDefinitions')
        ;
    }
}