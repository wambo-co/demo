<?php
namespace Wambo\HelloWambo;

use Slim\Http\Response;

class HelloWambo
{
    /**
     * @param $app \Wambo\Core\App
     */
    public function __construct($app)
    {
        $app->get('/', function ($request, $response, $args) {
            /** @var $response Response */
            $response->write("Hello Wambo!");
            return $response;
        });
    }
}