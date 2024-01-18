<?php 

use Slim\App;
use App\Controllers\CityController;
use App\Controllers\RegionController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    /** Routes définitions */
    $app->get('/cities', [CityController::class , 'getCities']); 
    $app->get('/cities/{id:[0-9]+}', [CityController::class , 'getCityById']); 
    $app->get('/cities/name/{name:[a-zA-Z \- ]+}', [CityController::class , 'getCityByName']); 

    $app->get('/regions', [RegionController::class , 'getRegions']); 
    $app->get('/regions/{id:[0-9]+}', [RegionController::class , 'getRegionById']); 
    $app->get('/regions/name/{name:[a-zA-Z \- ]+}', [RegionController::class , 'getRegionByName']);

    $app->get('/region/id/{id:[0-9]+}', [CityController::class , 'getCitiesByRegionId']); 
    $app->get('/region/name/{name:[a-zA-Z \- ]+}', [CityController::class , 'getCitiesByRegionName']); 
};