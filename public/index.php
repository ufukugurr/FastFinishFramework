<?php
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

//Settings
require __DIR__ . '/../vendor/autoload.php';
$settings  = require __DIR__ . '/../config/settings.php';


//Router
$router = new RouteCollector();
require __DIR__ . '/../app/routes.php';
foreach (glob(__DIR__ . '/../app/controllers/*.php') as $filename)
{
    require $filename;
}
$dispatcher =  new Dispatcher($router->getData());
echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], str_replace($settings['path'],'',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))), "\n";
