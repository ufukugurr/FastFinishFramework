<?php
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

//Settings
require __DIR__ . '/../vendor/autoload.php';
$settings  = require __DIR__ . '/../config/settings.php';

//ActiveRecords ORM

ActiveRecord\Config::initialize(function($cfg)
{
   $cfg->set_model_directory(__DIR__ . '/../app/models');
   $cfg->set_connections([
       'development' => 'mysql://root:@localhost/fff',
    ]
   );
});
ActiveRecord\Config::initialize(function($cfg)
{
  $cfg->set_default_connection('development');
});

//Router
$router = new RouteCollector();
require __DIR__ . '/../app/routes.php';

$dispatcher =  new Dispatcher($router->getData());
echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], str_replace($settings['path'],'',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))), "\n";
