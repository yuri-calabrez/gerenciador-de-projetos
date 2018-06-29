<?php
use SON\Framework\Router;
use SON\Framework\App;

require __DIR__.'/vendor/autoload.php';

$routes = new Router;

require __DIR__.'./config/containers.php';
require __DIR__.'./config/events.php';
require __DIR__.'./config/routes.php';

$app = new App($routes, $container);

require __DIR__.'./config/middlewares.php';

$app->run();
