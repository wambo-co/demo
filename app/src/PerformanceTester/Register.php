<?php
namespace Wambo\PerformanceTester;

use Wambo\Core\App;
use Wambo\Core\Module\ModuleBootstrapInterface;

/**
 * Class Register
 * @package Wambo\PerformanceTester
 */
class Register implements ModuleBootstrapInterface
{

    public function __construct(App $app)
    {
        $app->add(new PerformanceMiddleware());
    }
}