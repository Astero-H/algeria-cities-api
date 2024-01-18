<?php

use App\Controllers\CityController;
use App\Controllers\RegionController;
use App\Services\CityService;
use App\Services\RegionService;

return [
    CityController::class => function ($container) {
        return new CityController($container->get(CityService::class));
    },

    CityService::class => function () {
        $path_cities = dirname(__DIR__).'/data/algeria_cities.json';
        $citiesData = json_decode(file_get_contents($path_cities), true);
        return new CityService($citiesData);
    },

    RegionController::class => function ($container) {
        return new RegionController($container->get(RegionService::class));
    },

    RegionService::class => function () {
        $path_regions = dirname(__DIR__).'/data/algeria_wilayas.json';
        $regionsData = json_decode(file_get_contents($path_regions), true);
        return new RegionService($regionsData);
    } 
];