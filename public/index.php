<?php 
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use App\Middlewares\CheckUriMiddleware;

require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$definitions = require dirname(__DIR__). '/app/containers.php';
$containerBuilder->addDefinitions($definitions);
$container = $containerBuilder->build();
AppFactory::setContainer($container);

$app = AppFactory::create();
$app->add(new CheckUriMiddleware());


// Register routes
$routes = require dirname(__DIR__). '/app/routes.php';
$routes($app);

$app->run();