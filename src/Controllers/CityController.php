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
        $cities = $this->cityService->getCities();
        return $this->writeJson($response, $cities, 200);
    }

    public function getCityById(Request $request, Response $response, array $args) {
        $cityId = (int)$args['id'];
        $city = $this->cityService->getCityById($cityId);
        if (!$city) {
            return $this->handleError($response, 'City id Not found', 404);
        }        
        return $this->writeJson($response, $city, 200);
    }

    public function getCityByName(Request $request, Response $response, array $args) {
        $cityName = (string)$args['name'];
        $city = $this->cityService->getCityByName($cityName);
        if (!$city) {
            return $this->handleError($response, 'City name Not found', 404);
        }        
        return $this->writeJson($response, $city, 200);
    }
}