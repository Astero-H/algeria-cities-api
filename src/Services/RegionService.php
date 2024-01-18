<?php

namespace App\Services;

class RegionService extends BaseService {
    private $regionsData;

    public function __construct(array $regionsData) {
        $this->regionsData = $regionsData;
    }

    public function getRegions() {
        return $this->regionsData;
    }

    public function getRegionById(int $id) {
        foreach($this->regionsData as $region) {
            if($region['id'] === (string)$id) {              
                return $region;
            } 
        }
        return null;
    }

    public function getRegionByName(string $name) {
        return $this->handleDataListWithName($name, $this->regionsData,'name');
    }

}
