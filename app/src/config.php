<?php
namespace Wambo;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Wambo\Core\Module\JSONModuleStorage;
use Wambo\Core\Module\ModuleMapper;
use Wambo\Core\Module\ModuleRepository;

return [
    'settings.httpVersion' => '1.1',
    'settings.responseChunkSize' => 4096,
    'settings.outputBuffering' => 'append',
    'settings.determineRouteBeforeAppMiddleware' => false,
    'settings.displayErrorDetails' => true,
    'settings.addContentLengthHeader' => true,
    'settings.routerCacheFile' => false,
    'filesystem_adapter' => function ($c) {
        return new Local(WAMBO_ROOT_DIR);
    },
    'filesystem' => function ($c) {
        return new Filesystem($c->get('filesystem_adapter'));
    },
    'module_repository' => function ($c) {
        /** @var Filesystem $filesystem */
        $filesystem = $c->get('filesystem');

        $storage = new JSONModuleStorage($filesystem, 'vendor/modules.json');
        $mapper = new ModuleMapper();

        return new ModuleRepository($storage, $mapper);
    }
];