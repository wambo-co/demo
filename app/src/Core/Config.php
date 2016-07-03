<?php
namespace Wambo\Core;
use Exception;

/**
 * Class Config
 * @package Wambo\Core
 */
class Config
{
    /**
     * @var string
     */
    private $config_folder_path = '/config/wambo';

    /**
     * @var array
     */
    private $modules;


    /**
     * Config constructor.
     */
    public function __construct()
    {
        $this->loadModules();
    }

    /**
     * @return array
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * Loads the modules.json in to an array
     *
     * @throws Exception
     */
    private function loadModules()
    {
        $modules_json_filename = $this->getConfigDir() . '/modules.json';

        if ( !file_exists($modules_json_filename) ) {
            throw new Exception('modules file not found');
        }

        if ( !is_readable($modules_json_filename ) ) {
            throw new Exception('modules file is not readable');
        }

        $modules_json = file_get_contents($modules_json_filename);
        $modules = json_decode($modules_json, true);

        // throw an Exception if something went wrong on json_decode
        if (json_last_error() !== JSON_ERROR_NONE) {
            $msg = json_last_error_msg();
            throw new Exception($msg);
        }

        $this->modules = $modules;
    }

    /**
     * Returns the path of the config folder
     *
     * @return string
     * @throws Exception
     */
    private function getConfigDir()
    {
        $config_folder = WAMBO_ROOT_DIR . $this->config_folder_path;

        if ( !file_exists($config_folder)){
            throw new Exception('config folder was not found');
        }

        if ( !is_readable($config_folder) ){
            throw new Exception('config folder was not readable');
        }

        return $config_folder;
    }


}