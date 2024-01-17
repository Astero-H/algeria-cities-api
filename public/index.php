<?php 
use App\Controllers\CityController;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$definitions = require dirname(__DIR__).'/app/containers.php';
$containerBuilder->addDefinitions($definitions);
$container = $containerBuilder->build();
AppFactory::setContainer($container);

$app = AppFactory::create();

/** Routes définitions */
$app->get('/cities', [CityController::class , 'getCities']); 
$app->get('/cities/{id}', [CityController::class , 'getCityById']); 

$app->run();