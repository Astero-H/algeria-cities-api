<?php 

use App\Middlewares\CheckUriMiddleware;
use Slim\Factory\AppFactory;
require __DIR__ . '/../vendor/autoload.php';

// Loading container settings
$container = require dirname(__DIR__). '/app/containers.php';
AppFactory::setContainer($container);
$app = AppFactory::create();

// Add middleware
$app->add(new CheckUriMiddleware());

// Register routes
$routes = require dirname(__DIR__). '/app/routes.php';
$routes($app);

$app->run();