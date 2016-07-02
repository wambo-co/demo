<?php
namespace Wambo\Core;

use Wambo\Core\App;
use Wambo\HelloWambo\HelloWambo;
use Wambo\Test\Test;

require_once '../app/bootstrap.php';

$app = new App();

// add Modules
new HelloWambo($app);
new Test($app);

// go wambo! go!
$app->run();