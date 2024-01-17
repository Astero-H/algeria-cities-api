<?php

namespace App\Services;

class CityService {
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

}
