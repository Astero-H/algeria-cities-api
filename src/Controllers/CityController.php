<?php 

namespace App\Controllers;

use App\Services\CityService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class CityController {

    private $cityService;

    public function __construct(CityService $cityService) {
        $this->cityService = $cityService;
    }


    public function getCities(Request $request, Response $response) {
        $cities = $this->cityService->getCities();
        $response->getBody()->write(json_encode($cities));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function getCityById(Request $request, Response $response, array $args) {
        $cityId = (int)$args['id'];
        $city = $this->cityService->getCityById($cityId);
        if (!$city) {
            $response->getBody()->write(json_encode(['error' => 'City not found']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }        
        // Envoyer la réponse
        $response->getBody()->write(json_encode($city));
        return $response->withHeader('Content-Type', 'application/json');
    }
}