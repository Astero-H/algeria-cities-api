<?php 

namespace App\Controllers;

use App\Services\RegionService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class RegionController extends BaseController {

    private $regionService;

    public function __construct(RegionService $regionService) {
        $this->regionService = $regionService;
    }


    public function getRegions(Request $request, Response $response) {
        $regions = $this->regionService->getRegions();
        return $this->writeJson($response, $regions, 200);
    }

    public function getRegionById(Request $request, Response $response, array $args) {
        $regionId = (int)$args['id'];
        $region = $this->regionService->getRegionById($regionId);
        if (!$region) {
            return $this->handleError($response, 'Region Not found', 404);
        }        
        return $this->writeJson($response, $region, 200);
    }

    public function getRegionByName(Request $request, Response $response, array $args) {
        $regionName = (string)$args['name'];
        $region = $this->regionService->getRegionByName($regionName);
        if (!$region) {
            return $this->handleError($response, 'Region name Not found', 404);
        }        
        return $this->writeJson($response, $region, 200);
    }
}