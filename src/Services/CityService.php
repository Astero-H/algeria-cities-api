<?php

namespace App\Services;

class CityService extends BaseService {
    private $citiesData;

    public function __construct(array $citiesData) {
        $this->citiesData = $citiesData;
    }

    public function getCities() {
        return $this->citiesData;
    }

    public function getCityById(int $id) {
        foreach($this->citiesData as $city) {
            if($city['id'] === $id) {
                return $city;
            } 
        }
        return null;
    }

    public function getCityByName(string $name) {
        return $this->handleDataListWithName($name, $this->citiesData, 'commune_name_ascii');
    }

    public function getCitiesByRegionId(int $id) {
        return $this->handleDataListWithId($this->citiesData, $id, 'wilaya_code');
    }

    public function getCitiesByRegionName(string $name) {
        return $this->handleDataListWithName($name, $this->citiesData, 'wilaya_name_ascii');
    }

 

}
