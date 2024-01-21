<?php 


use Slim\App;
use App\Controllers\CityController;
use App\Controllers\HomeController;
use App\Controllers\RegionController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    /** Routes définitions */
    $app->get('/', [HomeController::class , 'index']);
    
    $app->group('/cities', function (RouteCollectorProxy $group) {
        $group->get('', [CityController::class , 'getCities']); 
        $group->get('/{id:[0-9]+}', [CityController::class , 'getCityById']); 
        $group->get('/name/{name:[a-zA-Z \- ]+}', [CityController::class , 'getCityByName']); 
    });

    $app->group('/regions', function (RouteCollectorProxy $group) {
        $group->get('', [RegionController::class , 'getRegions']); 
        $group->get('/{id:[0-9]+}', [RegionController::class , 'getRegionById']); 
        $group->get('/name/{name:[a-zA-Z \- ]+}', [RegionController::class , 'getRegionByName']);
    });

    $app->group('/region', function (RouteCollectorProxy $group) {
        $group->get('/id/{id:[0-9]+}', [CityController::class , 'getCitiesByRegionId']); 
        $group->get('/name/{name:[a-zA-Z \- ]+}', [CityController::class , 'getCitiesByRegionName']); 
    });
};