<?php 

use Slim\App;
use App\Controllers\CityController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    /** Routes définitions */
    $app->get('/cities', [CityController::class , 'getCities']); 
    $app->get('/cities/{id}', [CityController::class , 'getCityById']); 

    // $app->get('/regions', [RegionController::class , 'getRegions']); 
    // $app->get('/regions/{id}', [RegionController::class , 'getRegionById']); 

    /***
     * TODO : 
     * New Routes to add : 
     * => Get all Wilayas/Regions
     * => Get Wilaya/Region by ID
     * => Search City by its name
     * => Search Wilaya/Region by its name 
    */
};