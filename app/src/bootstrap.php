<?php
namespace Wambo;

use Slim\Container;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Wambo\Core\Module\JSONModuleStorage;
use Wambo\Core\Module\ModuleMapper;
use Wambo\Core\Module\ModuleRepository;

$container = new Container();

$container['filesystem_adapter'] = function($c){ return new Local(WAMBO_ROOT_DIR); };
$container['filesystem'] = function($c){ return new Filesystem($c['filesystem_adapter']); };

$container['module_repository'] = function($c)
{
    /** @var Filesystem $filesystem */
    $filesystem = $c['filesystem'];

    $storage = new JSONModuleStorage($filesystem, 'vendor/modules.json');
    $mapper = new ModuleMapper();

    return new ModuleRepository($storage, $mapper);
};

