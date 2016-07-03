<?php
namespace Wambo\HelloWambo;

use Slim\Http\Response;
use Wambo\Core\App;
use Wambo\Core\Module;

class HelloWambo implements Module
{
    /**
     * @var \Wambo\Core\App|App
     */
    private $app;

    /**
     * @param $app \Wambo\Core\App
     */
    public function __construct(App $app)
    {
        $app->get('/', function ($request, $response, $args) {
            /** @var $response Response */
            $response->write("Hello Wambo!");
            return $response;
        });
        $this->app = $app;
    }
}