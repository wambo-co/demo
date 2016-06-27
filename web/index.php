<?php
namespace Wambo\Core;

use Wambo\Core\App;
use Wambo\HelloWambo\HelloWambo;

require_once '../app/bootstrap.php';

$app = new App();

// add Modules
new HelloWambo($app);

// go wambo! go!
$app->run();