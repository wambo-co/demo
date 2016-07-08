<?php
namespace Wambo\HelloWambo;

use Slim\Http\Response;
use Wambo\Core\App;
use Wambo\Core\Module\ModuleBootstrapInterface;

class HelloWambo implements ModuleBootstrapInterface
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
        $app->get('/hello', function ($request, $response, $args) {
            /** @var $response Response */
            $response->write("Hello Wambo!");
            return $response;
        });
        $this->app = $app;
    }
}