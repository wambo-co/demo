<?php
namespace Wambo\Core;

/**
 * Class App
 * @package Wambo\Core
 */
class App extends \Slim\App
{
    /**
     * @var Config
     */
    private $config;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->config = new Config();
        parent::__construct([]);

        $this->loadModules();
    }

    /**
     * add modules to App
     */
    private function loadModules()
    {
        foreach($this->config->getModules() as $module){
            $module_class = $module['namespace'] . '\\' . $module['name'];
            new $module_class($this);
        }
    }

}