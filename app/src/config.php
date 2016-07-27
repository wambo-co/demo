<?php
namespace Wambo;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Wambo\Core\Module\JSONModuleStorage;
use Wambo\Core\Module\ModuleMapper;
use Wambo\Core\Module\ModuleRepository;

return [
    'settings' => [
        'httpVersion' => '2.0',
        'responseChunkSize' => 4096,
        'outputBuffering' => 'append',
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,
        'addContentLengthHeader' => true,
        'routerCacheFile' => false,
    ],
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