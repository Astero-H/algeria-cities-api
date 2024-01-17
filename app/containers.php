<?php

use App\Controllers\CityController;
use App\Services\CityService;

return [
    CityController::class => function ($container) {
        return new CityController($container->get(CityService::class));
    },
    CityService::class => function () {
        $path_cities = dirname(__DIR__).'/data/algeria_cities.json';
        $citiesData = json_decode(file_get_contents($path_cities), true);
        return new CityService($citiesData);
    }  
];