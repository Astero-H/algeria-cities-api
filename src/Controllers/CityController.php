<?php 

namespace App\Controllers;

use App\Services\CityService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CityController extends BaseController {

    private $cityService;

    public function __construct(CityService $cityService) {
        $this->cityService = $cityService;
    }


    public function getCities(Request $request, Response $response) {
        $fountCities = $this->cityService->getCities();
        return $this->writeJson($response, $fountCities, 200);
    }

    public function getCityById(Request $request, Response $response, array $args) {
        $cityId = (int)$args['id'];
        $fountCity = $this->cityService->getCityById($cityId);
        if (!$fountCity) {
            return $this->handleError($response, 'City id not found', 404);
        }        
        return $this->writeJson($response, $fountCity, 200);
    }

    public function getCityByName(Request $request, Response $response, array $args) {
        $cityName = (string)$args['name'];
        $fountCity = $this->cityService->getCityByName(trim($cityName));
        if (!$fountCity) {
            return $this->handleError($response, 'City name not found', 404);
        }        
        return $this->writeJson($response, $fountCity, 200);
    }

    public function getCitiesByRegionId(Request $request, Response $response, array $args) {
        $regionId = (int)$args['id'];
        $fountCities = $this->cityService->getCitiesByRegionId($regionId);

        if (!$fountCities) {
            return $this->handleError($response, 'No cities fount', 404);
        }        
        return $this->writeJson($response, $fountCities, 200);
    }

    public function getCitiesByRegionName(Request $request, Response $response, array $args) {
        $regionName = (string)$args['name'];
        $fountCities = $this->cityService->getCitiesByRegionName($regionName);

        if (!$fountCities) {
            return $this->handleError($response, 'No cities fount', 404);
        }        
        return $this->writeJson($response, $fountCities, 200);
    }
    

}